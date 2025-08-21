<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'course_code',
        'grade',
        'semester',
        'academic_year',
        'credits',
        'gpa_points'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'credits' => 'decimal:1',
        'gpa_points' => 'decimal:2',
    ];

    // ============== RELATIONSHIPS ==============

    /**
     * Get the student who received this grade
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'staffNumber');
    }

    /**
     * Get the course for this grade
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'code');
    }

    // ============== SCOPES ==============

    /**
     * Scope to get grades by course
     */
    public function scopeByCourse($query, $courseCode)
    {
        return $query->where('course_code', $courseCode);
    }

    /**
     * Scope to get grades by semester
     */
    public function scopeBySemester($query, $semester)
    {
        return $query->where('semester', $semester);
    }

    /**
     * Scope to get grades by student
     */
    public function scopeByStudent($query, $studentId)
    {
        return $query->where('student_id', $studentId);
    }

    /**
     * Scope to get passing grades
     */
    public function scopePassing($query)
    {
        $passingGrades = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'E', 'S'];
        return $query->whereIn('grade', $passingGrades);
    }

    /**
     * Scope to get failing grades
     */
    public function scopeFailing($query)
    {
        $failingGrades = ['D+', 'D', 'D-', 'F', 'NG'];
        return $query->whereIn('grade', $failingGrades);
    }

    // ============== HELPER METHODS ==============

    /**
     * Check if this is a passing grade
     */
    public function isPassing(): bool
    {
        $passingGrades = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'E', 'S'];
        return in_array($this->grade, $passingGrades);
    }

    /**
     * Check if this is a failing grade
     */
    public function isFailing(): bool
    {
        $failingGrades = ['D+', 'D', 'D-', 'F', 'NG'];
        return in_array($this->grade, $failingGrades);
    }

    /**
     * Get GPA points for this grade
     */
    public function getGpaPoints(): float
    {
        $gradePoints = [
            'A' => 4.0, 'A-' => 3.7,
            'B+' => 3.3, 'B' => 3.0, 'B-' => 2.7,
            'C+' => 2.3, 'C' => 2.0, 'C-' => 1.7,
            'D+' => 1.3, 'D' => 1.0, 'D-' => 0.7,
            'F' => 0.0, 'NG' => 0.0
        ];

        return $gradePoints[$this->grade] ?? 0.0;
    }

    /**
     * Get grade category
     */
    public function getCategory(): string
    {
        $excellentGrades = ['A', 'A-'];
        $goodGrades = ['B+', 'B', 'B-'];
        $averageGrades = ['C+', 'C', 'C-'];
        $belowAverageGrades = ['D+', 'D', 'D-'];
        $failingGrades = ['F', 'NG'];
        $specialGrades = ['E', 'S', 'W', 'I'];

        if (in_array($this->grade, $excellentGrades)) {
            return 'Excellent';
        } elseif (in_array($this->grade, $goodGrades)) {
            return 'Good';
        } elseif (in_array($this->grade, $averageGrades)) {
            return 'Average';
        } elseif (in_array($this->grade, $belowAverageGrades)) {
            return 'Below Average';
        } elseif (in_array($this->grade, $failingGrades)) {
            return 'Failing';
        } elseif (in_array($this->grade, $specialGrades)) {
            return 'Special';
        }

        return 'Unknown';
    }

    // ============== STATIC METHODS ==============

    /**
     * Get all possible grades
     */
    public static function getAllGrades(): array
    {
        return ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-', 'F', 'NG', 'E', 'S', 'W', 'I'];
    }

    /**
     * Get grade distribution for a course
     */
    public static function getDistributionForCourse($courseCode, $semester = null): array
    {
        $query = self::where('course_code', $courseCode);
        
        if ($semester) {
            $query->where('semester', $semester);
        }
        
        $grades = $query->get();
        
        // Initialize all possible grades with 0
        $distribution = [];
        foreach (self::getAllGrades() as $grade) {
            $distribution[$grade] = 0;
        }
        
        // Count actual grades
        $actualDistribution = $grades->groupBy('grade')->map->count()->toArray();
        
        // Merge with initialized distribution
        return array_merge($distribution, $actualDistribution);
    }

    /**
     * Calculate statistics for a grade distribution
     */
    public static function calculateStatistics(array $gradeDistribution): array
    {
        $totalStudents = array_sum($gradeDistribution);
        
        if ($totalStudents === 0) {
            return [
                'total_students' => 0,
                'pass_rate' => 0,
                'fail_rate' => 0,
                'most_common_grade' => 'N/A',
                'average_gpa' => 'N/A',
                'pass_count' => 0,
                'fail_count' => 0
            ];
        }
        
        $passingGrades = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'E', 'S'];
        $failingGrades = ['D+', 'D', 'D-', 'F', 'NG'];
        
        $passCount = 0;
        $failCount = 0;
        
        foreach ($passingGrades as $grade) {
            $passCount += $gradeDistribution[$grade] ?? 0;
        }
        
        foreach ($failingGrades as $grade) {
            $failCount += $gradeDistribution[$grade] ?? 0;
        }
        
        $passRate = round(($passCount / $totalStudents) * 100, 1);
        $failRate = round(($failCount / $totalStudents) * 100, 1);
        
        // Find most common grade
        $filteredGrades = array_filter($gradeDistribution, function($count) {
            return $count > 0;
        });
        
        $mostCommonGrade = !empty($filteredGrades) 
            ? array_keys($filteredGrades, max($filteredGrades))[0] 
            : 'N/A';
        
        // Calculate GPA
        $gradePoints = [
            'A' => 4.0, 'A-' => 3.7,
            'B+' => 3.3, 'B' => 3.0, 'B-' => 2.7,
            'C+' => 2.3, 'C' => 2.0, 'C-' => 1.7,
            'D+' => 1.3, 'D' => 1.0, 'D-' => 0.7,
            'F' => 0.0, 'NG' => 0.0
        ];
        
        $totalPoints = 0;
        $countedStudents = 0;
        
        foreach ($gradeDistribution as $grade => $count) {
            if (isset($gradePoints[$grade]) && $count > 0) {
                $totalPoints += $gradePoints[$grade] * $count;
                $countedStudents += $count;
            }
        }
        
        $averageGpa = $countedStudents > 0 ? round($totalPoints / $countedStudents, 2) : 'N/A';
        
        return [
            'total_students' => $totalStudents,
            'pass_rate' => $passRate,
            'fail_rate' => $failRate,
            'most_common_grade' => $mostCommonGrade,
            'average_gpa' => $averageGpa,
            'pass_count' => $passCount,
            'fail_count' => $failCount
        ];
    }
}