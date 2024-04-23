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
        Schema::create('group_msg', function (Blueprint $table) {
            $table->string('group_name',50);
            $table->string('sent_by',50);
            $table->longText('msg');

            $table->foreign('group_name')
                ->references('group_name')
                ->on('grp_belongs');

            $table->foreign('sent_by')
                ->references('student_id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_msg');
    }
};
