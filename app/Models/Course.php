<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'title',
        'credits',
        'category',
        'department',
        'description',
        'instructor_id',
        'status',
        'year',
        'ects',
        'department_id',
        'semester',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'credits' => 'integer',
        'instructor_id' => 'integer',
    ];

    // ============== RELATIONSHIPS ==============

    /**
     * Get the instructor for this course
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * Get all grades for this course
     */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'course_code', 'code');
    }

    // ============== ACCESSORS ==============

    /**
     * Get the course title (fallback to name if title doesn't exist)
     */
    public function getTitleAttribute($value)
    {
        return $value ?? $this->attributes['name'] ?? 'Course';
    }

    /**
     * Get credits with fallback to 0
     */
    public function getCreditsAttribute($value)
    {
        return $value ?? 0;
    }

    /**
     * Get category with fallback
     */
    public function getCategoryAttribute($value)
    {
        return $value ?? 'General';
    }

    /**
     * Get department with fallback
     */
    public function getDepartmentAttribute($value)
    {
        return $value ?? 'General';
    }

    // ============== SCOPES ==============

    /**
     * Scope to get courses by instructor
     */
    public function scopeByInstructor($query, $instructorId)
    {
        return $query->where('instructor_id', $instructorId);
    }

    /**
     * Scope to get courses by department
     */
    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    /**
     * Scope to get active courses
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // ============== HELPER METHODS ==============

    /**
     * Get the full course display name
     */
    public function getFullNameAttribute()
    {
        return "{$this->code} - {$this->title}";
    }

    /**
     * Get grade distribution for this course
     */
    public function getGradeDistribution($semester = null)
    {
        $query = $this->grades();
        
        if ($semester) {
            $query->where('semester', $semester);
        }
        
        $grades = $query->get();
        
        // Initialize all possible grades
        $allGrades = ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-', 'F', 'NG', 'E', 'S', 'W', 'I'];
        $distribution = [];
        
        foreach ($allGrades as $grade) {
            $distribution[$grade] = 0;
        }
        
        // Count actual grades
        $actualDistribution = $grades->groupBy('grade')->map->count()->toArray();
        
        // Merge with initialized distribution
        $distribution = array_merge($distribution, $actualDistribution);
        
        return $distribution;
    }

    /**
     * Get course statistics
     */
    public function getStatistics($semester = null)
    {
        $gradeDistribution = $this->getGradeDistribution($semester);
        $totalStudents = array_sum($gradeDistribution);
        
        if ($totalStudents === 0) {
            return [
                'total_students' => 0,
                'pass_rate' => 0,
                'fail_rate' => 0,
                'most_common_grade' => 'N/A',
                'average_gpa' => 'N/A'
            ];
        }
        
        // Define passing and failing grades
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
        
        if (!empty($filteredGrades)) {
            $mostCommonGrade = array_keys($filteredGrades, max($filteredGrades))[0];
        } else {
            $mostCommonGrade = 'N/A';
        }
        
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

    /**
     * Check if user can access this course
     */
    public function canBeAccessedBy(User $user): bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        
        if ($user->isHeadDepartment()) {
            return $this->department === $user->department;
        }
        
        if ($user->isInstructor()) {
            return $this->instructor_id === $user->id;
        }
        
        return false;
    }
}