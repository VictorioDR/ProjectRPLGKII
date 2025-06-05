<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri'; // Nama tabel di database

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'status',
        'created_at',
        'updated_at',

    ];
}
