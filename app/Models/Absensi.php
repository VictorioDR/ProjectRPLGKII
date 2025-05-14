<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'jemaat_id',
        'jadwal_ibadah_id',
        'tanggal',
        'status',
        'keterangan'
    ];

    // Relasi dengan Jemaat
    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class);
    }

    // Relasi dengan JadwalIbadah
    public function jadwalIbadah()
    {
        return $this->belongsTo(JadwalIbadah::class);
    }
}
