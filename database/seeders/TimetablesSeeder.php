<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimetablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data jadwal
        $timetables = [
            [
                'day' => 'Senin',
                'subject' => 'Matematika',
                'start_time' => '08:00:00',
                'end_time' => '09:30:00',
                'classroom' => 'Kelas A',
                'teacher_name' => 'Nama Guru 1',
            ],
            [
                'day' => 'Selasa',
                'subject' => 'Bahasa Inggris',
                'start_time' => '10:00:00',
                'end_time' => '11:30:00',
                'classroom' => 'Kelas B',
                'teacher_name' => 'Nama Guru 2',
            ],
            // Tambahkan data jadwal lain sesuai kebutuhan
        ];

        // Insert data ke dalam tabel "timetables"
        DB::table('timetables')->insert($timetables);
        
    }
}
