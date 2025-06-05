<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiUmum extends Model
{
    use HasFactory;

    protected $table = 'informasi_umum'; // Nama tabel di database

    protected $fillable = [
        'judul',
        'isi',
        'status', // Contoh: aktif/non-aktif
    ];
}
