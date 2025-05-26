<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPelayananKategorial;
use Carbon\Carbon;

class JadwalPelayananKategorialSeeder extends Seeder
{
    public function run(): void
    {
        JadwalPelayananKategorial::insert([
            [
                'kategori' => 'Pemuda',
                'tanggal' => Carbon::now()->addDays(5)->toDateString(),
                'waktu_mulai' => '18:00:00',
                'waktu_selesai' => '20:00:00',
                'tempat' => 'GKII Tanjung Selor',
                'petugas' => 'Yohanes',
                'deskripsi' => 'Ibadah kategorial pemuda mingguan.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 'Kaum Ibu',
                'tanggal' => Carbon::now()->subDays(3)->toDateString(),
                'waktu_mulai' => '15:00:00',
                'waktu_selesai' => '17:00:00',
                'tempat' => 'Aula Gereja',
                'petugas' => 'Ibu Sari',
                'deskripsi' => 'Kebaktian rutin kaum ibu.',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
