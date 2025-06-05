<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelayanan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelayanan';

    protected $fillable = [
        'jenis',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'wl',
        'singers',
        'firman_tuhan',
        'multimedia',
        'musik_sound',
        'koordinator_ibadah',
        'musik',
        'sifat',
        'deskripsi',
        'status'
    ];
}
