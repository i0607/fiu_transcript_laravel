<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    // ADD 'program_level' to your existing fillable array
    protected $fillable = [
        'student_number',
        'name',
        'department_id',
        'program_level',  // ADD THIS LINE
        'date_of_birth',
        'entry_date',
        'graduation_date',
        // ... any other existing fields
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'entry_date' => 'date',
        'graduation_date' => 'date',
    ];

    // Your existing relationships (keep these as they are)
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function transcripts(): HasMany
    {
        return $this->hasMany(Transcript::class);
    }

    // ADD these new methods for grade control:

    /**
     * Check if a grade is passing for this student's program level
     */
    public function isPassingGrade(string $grade): bool
    {
        $passingGrades = match($this->program_level ?? 'undergraduate') {
            'phd' => [
                'A', 'A-', 'B+', 'B', 'B-',  // B- minimum for PhD
                'E', 'S'  // Special grades
            ],
            'master' => [
                'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-',  // C- minimum for Master's
                'E', 'S'
            ],
            'undergraduate' => [
                'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-',  // D- minimum
                'E', 'S'
            ],
            default => [
                'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-', 'E', 'S'
            ]
        };
        
        return in_array($grade, $passingGrades);
    }

    /**
     * Get minimum passing grade for this student's program
     */
    public function getMinimumGrade(): string
    {
        return match($this->program_level ?? 'undergraduate') {
            'phd' => 'B-',
            'master' => 'C-',
            'undergraduate' => 'D-',
            default => 'D-'
        };
    }

    /**
     * Get complete grade analysis for frontend display
     */
    public function analyzeGrade(string $grade): array
    {
        $isPassing = $this->isPassingGrade($grade);
        $programLevel = $this->program_level ?? 'undergraduate';
        
        // Handle special grades
        if ($grade === 'E') {
            return [
                'grade' => $grade,
                'is_passing' => true,
                'status' => 'EXEMPTED',
                'color' => 'info',
                'message' => 'Course exempted'
            ];
        }
        
        if ($grade === 'S') {
            return [
                'grade' => $grade,
                'is_passing' => true,
                'status' => 'SATISFACTORY',
                'color' => 'primary',
                'message' => 'Satisfactory completion'
            ];
        }
        
        // Regular grade evaluation
        if ($isPassing) {
            if (in_array($grade, ['A', 'A-'])) {
                return [
                    'grade' => $grade,
                    'is_passing' => true,
                    'status' => 'EXCELLENT',
                    'color' => 'success',
                    'message' => 'Excellent performance'
                ];
            } elseif (in_array($grade, ['B+', 'B', 'B-'])) {
                return [
                    'grade' => $grade,
                    'is_passing' => true,
                    'status' => 'GOOD',
                    'color' => 'info',
                    'message' => 'Good performance'
                ];
            } elseif (in_array($grade, ['C+', 'C', 'C-'])) {
                return [
                    'grade' => $grade,
                    'is_passing' => true,
                    'status' => 'SATISFACTORY',
                    'color' => 'primary',
                    'message' => 'Satisfactory performance'
                ];
            } elseif (in_array($grade, ['D+', 'D', 'D-'])) {
                return [
                    'grade' => $grade,
                    'is_passing' => true,
                    'status' => 'LOW PASS',
                    'color' => 'warning',
                    'message' => 'Low passing grade'
                ];
            }
        }
        
        // Failing grade
        return [
            'grade' => $grade,
            'is_passing' => false,
            'status' => 'FAIL',
            'color' => 'error',
            'message' => "Failing grade for {$programLevel} level (requires {$this->getMinimumGrade()} minimum)"
        ];
    }

    /**
     * Auto-detect program level from student number if not set
     */
    public function detectAndSetProgramLevel(): void
    {
        if ($this->program_level) {
            return; // Already set, don't change
        }
        
        $studentNumber = $this->student_number;
        $detectedLevel = 'undergraduate'; // default
        
        // Customize these patterns for your institution
        if (str_starts_with($studentNumber, '22') || str_contains($studentNumber, 'PHD')) {
            $detectedLevel = 'phd';
        } elseif (str_starts_with($studentNumber, '21') || str_contains($studentNumber, 'MS')) {
            $detectedLevel = 'master';
        }
        
        $this->update(['program_level' => $detectedLevel]);
    }
}