<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    protected $table = 'jemaat';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'email',
        'status_anggota',
        'tanggal_bergabung',
        'status_aktif'
    ];

    // Relasi dengan Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
