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
        Schema::create('jamkes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jam');
            $table->time('waktu_awal'); // Tambahkan kolom waktu_awal
            $table->time('waktu_akhir'); // Tambahkan kolom waktu_akhir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamkes');
    }
};
