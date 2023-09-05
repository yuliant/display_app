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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
        // Menambahkan data pengaturan awal
        DB::table('settings')->insert([
            'key' => 'app_name',
            'value' => 'My Awesome App',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('settings')->insert([
            'key' => 'app_logo',
            'value' => 'path/to/logo.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('settings')->insert([
            'key' => 'app_description',
            'value' => 'Aplikasi yang luar biasa!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('settings')->insert([
            'key' => 'contact_info',
            'value' => 'Email: info@example.com, Phone: +123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('settings')->insert([
            'key' => 'language',
            'value' => 'en', // Default language code
            'created_at' => now(),
            'updated_at' => now(),
        ]);        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
