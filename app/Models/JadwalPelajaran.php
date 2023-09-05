<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajaran'; // Nama tabel

    protected $fillable = [
        'kode_guru',
        'rombel_id',
        'jamke_id',
        'hari',
        // Tambahkan kolom-kolom lain yang perlu diisi di sini
    ];

    // Relasi dengan tabel Gurus
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'kode_guru', 'kode_guru');
    }

    // Relasi dengan tabel Rombels
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id', 'id');
    }

    // Relasi dengan tabel JamKe
    public function jamke()
    {
        return $this->belongsTo(JamKe::class, 'jamke_id', 'id');
    }
}
