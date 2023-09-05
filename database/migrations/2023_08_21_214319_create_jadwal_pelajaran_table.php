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
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_guru'); // Menggunakan kolom "kode_guru" sebagai referensi
            $table->unsignedBigInteger('rombel_id');
            $table->unsignedBigInteger('jamke_id');
            $table->string('hari');
            $table->timestamps();
    
            $table->foreign('kode_guru')->references('kode_guru')->on('gurus'); // Menggunakan "kode_guru" sebagai kunci referensi
            $table->foreign('rombel_id')->references('id')->on('rombels');
            $table->foreign('jamke_id')->references('id')->on('jamkes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajaran');
    }
};
