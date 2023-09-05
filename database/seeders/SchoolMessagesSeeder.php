<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data
        $data = [
            [
                'pembuat' => 'admin', // Gantilah dengan role yang sesuai
                'message' => 'Ini adalah contoh pesan dari admin.',
                'created_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel school_messages
        DB::table('school_messages')->insert($data);
    }
}
