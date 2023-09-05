<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $table = 'timetables'; // Nama tabel sesuai dengan tabel yang ada di database

    protected $fillable = [
        'day',
        'subject',
        'start_time',
        'end_time',
        'classroom',
        'teacher_name',
    ];

    // Tambahan kode lain yang diperlukan    
}
