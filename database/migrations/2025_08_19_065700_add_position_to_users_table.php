<?php
// Create this migration: php artisan make:migration add_position_to_users_table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('position', [
                'admin', 
                'head_department', 
                'instructor'
            ])->default('instructor')->after('role');
            
            // You might also want to add instructor_courses relationship
            $table->json('instructor_courses')->nullable()->after('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['position', 'instructor_courses']);
        });
    }
};