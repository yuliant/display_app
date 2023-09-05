<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class GuruBlankoExport implements FromCollection
{
    public function collection()
    {
        // Buat koleksi kosong dengan kolom-kolom yang sesuai
        return collect([
            ['Kode Guru', 'Nama Guru', 'Mata Pelajaran'],
        ]);
    }

}

