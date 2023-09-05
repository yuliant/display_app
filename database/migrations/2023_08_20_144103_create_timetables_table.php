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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('day'); // Hari (Senin, Selasa, dll.)
            $table->string('subject'); // Mata Pelajaran
            $table->time('start_time'); // Waktu Mulai
            $table->time('end_time'); // Waktu Selesai
            $table->string('classroom'); // Ruangan Kelas
            $table->string('teacher_name'); // Nama Guru
            // Tambahkan kolom lain yang diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
