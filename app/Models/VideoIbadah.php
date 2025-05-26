<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoIbadah extends Model
{
    use HasFactory;

    protected $table = 'video_ibadah'; // Nama tabel di database

    protected $fillable = [
        'judul',
        'deskripsi',
        'link_video',
        'status', // Contoh status aktif/non-aktif
    ];
}
