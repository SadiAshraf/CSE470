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
        Schema::create('dm_table', function (Blueprint $table) {
            $table->string('sender_id',50);
            $table->string('reciver_id',50);
            $table->longtext('msg');

            $table->foreign('sender_id')
                ->references('student_id')
                ->on('students');

            $table->foreign('reciver_id')
                ->references('student_id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_table');
    }
};
