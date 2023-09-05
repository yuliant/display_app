<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOfTheMonth extends Model
{
    use HasFactory;
    protected $table = 'student_of_the_month';

    protected $fillable = [
        'nama_siswa',
        'ket_prestasi',
        'foto',
    ];    
}
