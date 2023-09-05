<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadisNabi extends Model
{
    use HasFactory;
    protected $table = 'hadis_nabi';
    protected $fillable = [
        'judul',
        'isi',
        //Tambahkan kolom-kolom lain yang perlu diisi di sini
    ];    
}
