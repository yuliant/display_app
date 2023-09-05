<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamKe extends Model
{
    use HasFactory;
    protected $table = 'jamkes';
    protected $fillable = [
        'hari',
        'nama_jam',
        'waktu_awal',
        'waktu_akhir',
        'no_urut',
        //Tambahkan kolom-kolom lain yang perlu diisi di sini
    ];
}
