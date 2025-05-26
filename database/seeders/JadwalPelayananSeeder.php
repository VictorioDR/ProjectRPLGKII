<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPelayanan;
use Carbon\Carbon;

class JadwalPelayananSeeder extends Seeder
{
    public function run(): void
    {
        JadwalPelayanan::insert([
            [
                'jenis' => 'Pelayanan Ibadah Raya 1',
                'tanggal' => Carbon::now()->addDays(2)->toDateString(),
                'waktu_mulai' => '07:00:00',
                'waktu_selesai' => '08:00:00',
                'tempat' => 'GKII Tanjung Selor',
                'wl' => 'Andi',
                'singers' => 'Tim Pujian 1',
                'firman_tuhan' => 'Pdt. Maria',
                'multimedia' => 'Budi',
                'musik_sound' => 'Roni',
                'koordinator_ibadah' => 'Yuli',
                'musik' => 'Tim Musik A',
                'sifat' => 'umum',
                'deskripsi' => 'Pelayanan minggu rutin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Pelayanan Ibadah Raya 2',
                'tanggal' => Carbon::now()->subDays(1)->toDateString(),
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:00:00',
                'tempat' => 'GKII Tanjung Selor',
                'wl' => 'Joko',
                'singers' => 'Tim Pujian 2',
                'firman_tuhan' => 'Pdt. Mario',
                'multimedia' => 'Tono',
                'musik_sound' => 'Bagas',
                'koordinator_ibadah' => 'Vina',
                'musik' => 'Tim Musik B',
                'sifat' => 'umum',
                'deskripsi' => 'Pelayanan minggu rutin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
