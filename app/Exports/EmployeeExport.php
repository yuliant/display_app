<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Position',
            // tambahkan kolom lain jika diperlukan
        ];
    }
}
