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
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 50)->primary();
            $table->string('name', 50);
            $table->string('password', 50);
            $table->string('session', 50)->nullable();

        });

        // Insert values into the table
        DB::table('students')->insert([
            ['student_id' => '21101070', 'name' => 'Mahfujul Islam', 'password' => 'qqqq'],
            ['student_id' => '21101071', 'name' => 'Niloy Ahsan', 'password' => 'aaaa'],
            ['student_id' => '21101072', 'name' => 'Sadi Ashraf', 'password' => 'zzzz'],
            ['student_id' => '21101073', 'name' => 'Adnan Sami', 'password' => 'wwww'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
