<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class TimetableBlankoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Buatlah struktur Excel kosong sesuai kebutuhan Anda
        return collect([
            // Data Excel kosong
            ['Nama Guru', 'Hari', 'Mata Pelajaran', 'Start Time', 'End Time', 'Kelas'],
            ['', '', '', '', '', ''],
            ['', '', '', '', '', ''],
            // Tambahkan lebih banyak baris jika diperlukan
        ]);
    }
}
