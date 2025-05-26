<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelayananMingguan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelayanan_mingguan'; // <- ini ditambahkan
}

