<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ibadah';

    protected $fillable = [
        'judul',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'tema',
        'pengkhotbah',
        'deskripsi',
        'status'
    ];

    // Relasi dengan Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
