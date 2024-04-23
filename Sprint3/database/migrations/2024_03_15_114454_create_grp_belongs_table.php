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
        Schema::create('grp_belongs', function (Blueprint $table) {
            $table->string("group_name",50)->primary();
            $table->string("belongs_to",50);


            $table->foreign('belongs_to')
                ->references('course_id')
                ->on('offered_courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grp_belongs');
    }
};
