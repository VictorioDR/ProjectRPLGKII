<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    protected $table = 'jemaat';

    protected $fillable = [
        'nama', 'alamat', 'telepon', 'email', 'tanggal_lahir',
        'jenis_kelamin', 'status_pernikahan', 'foto'
    ];

    public function aspirasi()
    {
        return $this->hasMany(AspirasiJemaat::class);
    }
}
