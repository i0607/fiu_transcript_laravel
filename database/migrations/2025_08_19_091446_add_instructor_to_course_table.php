<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Add instructor_id to link courses with instructors
            if (!Schema::hasColumn('courses', 'instructor_id')) {
                $table->unsignedBigInteger('instructor_id')->nullable()->after('id');
                $table->foreign('instructor_id')->references('id')->on('users')->onDelete('set null');
            }
            
            // Add department column if it doesn't exist
            if (!Schema::hasColumn('courses', 'department')) {
                $table->string('department')->nullable();
            }
            
            // Add status column for active/inactive courses
            if (!Schema::hasColumn('courses', 'status')) {
                $table->enum('status', ['active', 'inactive'])->default('active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
            $table->dropColumn(['instructor_id', 'department', 'status']);
        });
    }
};