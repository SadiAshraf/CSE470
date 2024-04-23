<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_contents', function (Blueprint $table) {
            $table->string('course_id',50);
            $table->string('type',50);
            $table->string('path',500);

            $table->foreign('course_id')
                ->references('course_id')
                ->on('offered_courses');
        });
        DB::table('course_contents')->insert([
            ['course_id' => 'CSE110', 'type' => 'test', 'path' => 'contents\Test 1 for CSE110.pdf'],
            ['course_id' => 'CSE110', 'type' => 'test', 'path' => 'contents\Test 2 for CSE110.pdf'],
            ['course_id' => 'CSE110', 'type' => 'notes', 'path' => 'contents\Note 1 for CSE110.pdf'],
            ['course_id' => 'CSE110', 'type' => 'notes', 'path' => 'contents\Note 2 for CSE110.pdf'],
            
            ['course_id' => 'CSE111', 'type' => 'test', 'path' => 'contents\Test 1 for CSE111.pdf'],
            ['course_id' => 'CSE111', 'type' => 'test', 'path' => 'contents\Test 2 for CSE111.pdf'],
            ['course_id' => 'CSE111', 'type' => 'notes', 'path' => 'contents\Note 1 for CSE111.pdf'],
            ['course_id' => 'CSE111', 'type' => 'notes', 'path' => 'contents\Note 2 for CSE111.pdf'],
            
            ['course_id' => 'CSE220', 'type' => 'test', 'path' => 'contents\Test 1 for CSE220.pdf'],
            ['course_id' => 'CSE220', 'type' => 'test', 'path' => 'contents\Test 2 for CSE220.pdf'],
            ['course_id' => 'CSE220', 'type' => 'notes', 'path' => 'contents\Note 1 for CSE220.pdf'],
            ['course_id' => 'CSE220', 'type' => 'notes', 'path' => 'contents\Note 2 for CSE220.pdf'],
            
            ['course_id' => 'CSE221', 'type' => 'test', 'path' => 'contents\Test 1 for CSE221.pdf'],
            ['course_id' => 'CSE221', 'type' => 'test', 'path' => 'contents\Test 2 for CSE221.pdf'],
            ['course_id' => 'CSE221', 'type' => 'notes', 'path' => 'contents\Note 1 for CSE221.pdf'],
            ['course_id' => 'CSE221', 'type' => 'notes', 'path' => 'contents\Note 2 for CSE221.pdf'],
            
            ['course_id' => 'CSE230', 'type' => 'test', 'path' => 'contents\Test 1 for CSE230.pdf'],
            ['course_id' => 'CSE230', 'type' => 'test', 'path' => 'contents\Test 2 for CSE230.pdf'],
            ['course_id' => 'CSE230', 'type' => 'notes', 'path' => 'contents\Notes 1 for CSE230.pdf'],
            ['course_id' => 'CSE230', 'type' => 'notes', 'path' => 'contents\Notes 2 for CSE230.pdf'],

            ['course_id' => 'CSE250', 'type' => 'test', 'path' => 'contents\Test 1 for CSE250.pdf'],
            ['course_id' => 'CSE250', 'type' => 'test', 'path' => 'contents\Test 2 for CSE250.pdf'],
            ['course_id' => 'CSE250', 'type' => 'notes', 'path' => 'contents\Notes 1 for CSE250.pdf'],
            ['course_id' => 'CSE250', 'type' => 'notes', 'path' => 'contents\Notes 2 for CSE250.pdf'],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_contents');
    }
};
