<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ibadah';

    protected $fillable = [
        'tanggal',
        'wl',
        'singers',
        'tim_musik',
        'pengkhotbah',
        'tempat',
        'multimedia',
    ];

    protected $casts = [
        'singers' => 'array',
        'tim_musik' => 'array',
    ];
}
