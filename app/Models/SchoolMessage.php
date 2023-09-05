<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMessage extends Model
{
    use HasFactory;
    protected $table = 'school_messages'; // Nama tabel
    protected $fillable = ['pembuat', 'message']; // Kolom yang dapat diisi

    // Tambahan kode lainnya, seperti relasi atau metode, jika diperlukan    
}
