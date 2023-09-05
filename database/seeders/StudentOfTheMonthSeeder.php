<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentOfTheMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_of_the_month')->insert([
            'nama_siswa' => 'M. FAIZ RAMADHAN FIRDAUS',
            'ket_prestasi' => 'Juara 1 Lomba Matematika',
            'foto' => 'link_foto_siswa.jpg',
            'created_at' => now(),
        ]);
    }
}
