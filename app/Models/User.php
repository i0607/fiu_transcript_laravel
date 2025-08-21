<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'department',
        'staffNumber',
        'email',
        'password',
        'role', // Add this
        'position',
        'instructor_courses'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'instructor_courses' => 'array', // Cast JSON to array
    ];

    // ============== ROLE CHECKING METHODS ==============
    
    /**
     * Check if user is an admin
     */
    public function isAdmin(): bool
    {
        return $this->position === 'admin' || $this->role === 'admin';
    }

    /**
     * Check if user is a head of department
     */
    public function isHeadDepartment(): bool
    {
        return $this->position === 'head_department' || $this->role === 'head_department';
    }

    /**
     * Check if user is an instructor
     */
    public function isInstructor(): bool
    {
        return $this->position === 'instructor' || $this->role === 'instructor';
    }

    /**
     * Check if user is a student
     */
    public function isStudent(): bool
    {
        return $this->position === 'student' || $this->role === 'student';
    }

    /**
     * Check if user has administrative privileges (admin or head of department)
     */
    public function hasAdminPrivileges(): bool
    {
        return $this->isAdmin() || $this->isHeadDepartment();
    }

    /**
     * Check if user can view all courses in department
     */
    public function canViewAllCourses(): bool
    {
        return $this->hasAdminPrivileges();
    }

    /**
     * Check if user can view grade distributions
     */
    public function canViewGradeDistributions(): bool
    {
        return in_array($this->position, ['admin', 'head_department', 'instructor']) ||
               in_array($this->role, ['admin', 'head_department', 'instructor']);
    }

    // ============== EXISTING METHODS (KEPT AS IS) ==============

    public function getAccessibleCourses()
    {
        if ($this->isAdmin()) {
            // Admin can see all courses
            return collect(); // Return empty to indicate "all"
        } elseif ($this->isHeadDepartment()) {
            // Head of department can see all courses in their department
            return collect(); // Will be filtered by department in the controller
        } else {
            // Instructor can only see their assigned courses
            return collect($this->instructor_courses ?? []);
        }
    }

    // Check if user can access a specific department
    public function canAccessDepartment($department)
    {
        if ($this->isAdmin()) {
            return true;
        }
                
        return $this->department === $department;
    }

    // Check if user can access a specific course
    public function canAccessCourse($courseCode)
    {
        if ($this->isAdmin()) {
            return true;
        }

        if ($this->isHeadDepartment()) {
            // Head can access all courses in their department
            // This would need to be checked against the course's department
            return true; // Will be filtered in controller
        }

        if ($this->isInstructor()) {
            // Instructor can only access their assigned courses
            $instructorCourses = $this->instructor_courses ?? [];
            return in_array($courseCode, $instructorCourses);
        }

        return false;
    }

    // ============== ADDITIONAL HELPER METHODS ==============

    /**
     * Get the user's role/position for display
     */
    public function getRoleDisplayAttribute(): string
    {
        $role = $this->position ?? $this->role ?? 'user';
        return ucwords(str_replace('_', ' ', $role));
    }

    /**
     * Get courses this user can access (as array)
     */
    public function getAccessibleCoursesArray(): array
    {
        if ($this->canViewAllCourses()) {
            return []; // Empty array means all courses
        }

        if ($this->isInstructor()) {
            return $this->instructor_courses ?? [];
        }

        return [];
    }

    /**
     * Check if user can manage users
     */
    public function canManageUsers(): bool
    {
        return $this->isAdmin();
    }

    /**
     * Check if user can manage courses
     */
    public function canManageCourses(): bool
    {
        return $this->hasAdminPrivileges();
    }

    /**
     * Check if user can view student grades
     */
    public function canViewStudentGrades(): bool
    {
        return $this->canViewGradeDistributions();
    }

    // ============== RELATIONSHIPS ==============

    /**
     * Get courses this user instructs (if instructor)
     */
    public function instructedCourses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    /**
     * Get grades for this user (if student)
     */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id', 'staffNumber');
    }

    // ============== SCOPES ==============

    /**
     * Scope to get users by role/position
     */
    public function scopeByRole($query, $role)
    {
        return $query->where(function($q) use ($role) {
            $q->where('position', $role)->orWhere('role', $role);
        });
    }

    /**
     * Scope to get users by department
     */
    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    /**
     * Scope to get instructors
     */
    public function scopeInstructors($query)
    {
        return $query->byRole('instructor');
    }

    /**
     * Scope to get admins
     */
    public function scopeAdmins($query)
    {
        return $query->byRole('admin');
    }
}