<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspirasiJemaat extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'aspirasi_jemaat';

    // Kolom yang dapat diisi
    protected $fillable = [
        'jemaat_id',
        'judul_aspirasi',
        'isi_aspirasi',
        'status',
    ];

    /**
     * Relasi ke model Jemaat.
     * Satu aspirasi dimiliki oleh satu jemaat.
     */
    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class, 'jemaat_id');
    }
}
