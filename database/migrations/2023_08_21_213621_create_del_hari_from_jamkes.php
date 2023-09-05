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
        Schema::table('jamkes', function (Blueprint $table) {
            $table->dropColumn('hari'); // Hapus kolom hari
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jamkes', function (Blueprint $table) {
            $table->string('hari'); // Jika Anda ingin membuat kolom hari kembali saat rollback migrasi
        });
    }
};
