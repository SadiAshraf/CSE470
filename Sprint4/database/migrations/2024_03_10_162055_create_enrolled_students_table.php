<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrolled_students', function (Blueprint $table) {
            $table->string('course_id', 50);
            $table->string('student_id', 50);

            $table->foreign('course_id')
                ->references('course_id')
                ->on('offered_courses');
        });

        // Insert values into the table
        DB::table('enrolled_students')->insert([
            ['course_id' => 'CSE110', 'student_id' => '21101070'],
            ['course_id' => 'CSE111', 'student_id' => '21101070'],
            ['course_id' => 'CSE230', 'student_id' => '21101070'],
            ['course_id' => 'CSE250', 'student_id' => '21101070'],

            ['course_id' => 'CSE111', 'student_id' => '21101071'],
            ['course_id' => 'CSE220', 'student_id' => '21101071'],
            ['course_id' => 'CSE221', 'student_id' => '21101071'],
            ['course_id' => 'CSE230', 'student_id' => '21101071'],

            ['course_id' => 'CSE220', 'student_id' => '21101072'],
            ['course_id' => 'CSE221', 'student_id' => '21101072'],
            ['course_id' => 'CSE230', 'student_id' => '21101072'],
            ['course_id' => 'CSE250', 'student_id' => '21101072'],

            ['course_id' => 'CSE110', 'student_id' => '21101073'],
            ['course_id' => 'CSE221', 'student_id' => '21101073'],
            ['course_id' => 'CSE230', 'student_id' => '21101073'],
            ['course_id' => 'CSE250', 'student_id' => '21101073'],

            ['course_id' => 'CSE110', 'student_id' => '21101074'],
            ['course_id' => 'CSE111', 'student_id' => '21101074'],
            ['course_id' => 'CSE220', 'student_id' => '21101074'],
            ['course_id' => 'CSE250', 'student_id' => '21101074'],

            // -------------------------------------------------------
            ['course_id' => 'CSE110', 'student_id' => '21101075'],
            ['course_id' => 'CSE111', 'student_id' => '21101075'],
            ['course_id' => 'CSE230', 'student_id' => '21101075'],
            ['course_id' => 'CSE250', 'student_id' => '21101075'],

            ['course_id' => 'CSE250', 'student_id' => '21101076'],
            ['course_id' => 'CSE111', 'student_id' => '21101076'],
            ['course_id' => 'CSE220', 'student_id' => '21101076'],
            ['course_id' => 'CSE230', 'student_id' => '21101076'],

            ['course_id' => 'CSE221', 'student_id' => '21101077'],
            ['course_id' => 'CSE230', 'student_id' => '21101077'],
            ['course_id' => 'CSE250', 'student_id' => '21101077'],
            ['course_id' => 'CSE220', 'student_id' => '21101077'],

            ['course_id' => 'CSE250', 'student_id' => '21101078'],
            ['course_id' => 'CSE110', 'student_id' => '21101078'],
            ['course_id' => 'CSE111', 'student_id' => '21101078'],
            ['course_id' => 'CSE230', 'student_id' => '21101078'],

            ['course_id' => 'CSE111', 'student_id' => '21101079'],
            ['course_id' => 'CSE110', 'student_id' => '21101079'],
            ['course_id' => 'CSE220', 'student_id' => '21101079'],
            ['course_id' => 'CSE230', 'student_id' => '21101079'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_students');
    }
};

