<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Timetable;

class TimetableImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            // Pastikan data sesuai dengan format kolom Excel
            if (count($row) !== 6) {
                continue; // Lewatkan baris yang tidak sesuai format
            }

            // Lakukan validasi data sesuai kebutuhan Anda
            $teacherName = $row[0];
            $day = $row[1];
            $subject = $row[2];
            $startTime = $row[3];
            $endTime = $row[4];
            $classroom = $row[5];

            // Contoh validasi: pastikan nama guru tidak kosong
            if (empty($teacherName)) {
                continue; // Lewatkan baris dengan nama guru kosong
            }

            // Simpan data jadwal ke dalam database
            Timetable::create([
                'teacher_name' => $teacherName,
                'day' => $day,
                'subject' => $subject,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'classroom' => $classroom,
            ]);
        }
    }
}
