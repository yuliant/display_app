<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Guru; // Tambahkan ini

class GuruImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Mengambil data mulai dari baris kedua (indeks 1)
        $importData = $rows->slice(1);

        // Lakukan iterasi untuk mengimpor data ke dalam tabel Guru
        foreach ($importData as $row) {
            // Sesuaikan dengan struktur tabel Guru
            Guru::create([
                'kode_guru' => $row[0],
                'nama_guru' => $row[1],
                'mata_pelajaran' => $row[2],
            ]);
        }
    }
}
