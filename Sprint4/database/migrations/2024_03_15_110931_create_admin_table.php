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
        Schema::create('admin', function (Blueprint $table) {
            $table->string('admin_id',50)->primary();
            $table->string('pass',50);
        });

        DB::table('admin')->insert([
            ['admin_id' => 'a-1111',  'pass' => '1111'],
            ['admin_id' => 'a-2222',  'pass' => '2222'],
            ['admin_id' => 'a-3333',  'pass' => '3333'],
            ['admin_id' => 'a-4444',  'pass' => '4444'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
