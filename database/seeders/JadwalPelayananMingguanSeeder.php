<?php

namespace Database\Seeders;

use App\Models\JadwalPelayananMingguan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JadwalPelayananMingguanSeeder extends Seeder
{
    public function run(): void
    {
        JadwalPelayananMingguan::insert([
            [
                'jenis' => 'Ibadah Raya 1',
                'tanggal' => Carbon::now()->addDays(1)->toDateString(),
                'waktu_mulai' => '07:00:00',
                'waktu_selesai' => '08:00:00',
                'tempat' => 'GKII Tanjung Selor',
                'petugas' => 'Tim A',
                'deskripsi' => 'Ibadah rutin hari Minggu.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Ibadah Keluarga',
                'tanggal' => Carbon::now()->addDays(3)->toDateString(),
                'waktu_mulai' => '19:00:00',
                'waktu_selesai' => '21:00:00',
                'tempat' => 'Rumah Jemaat',
                'petugas' => 'Pdt. Daniel',
                'deskripsi' => 'Ibadah keluarga di rumah jemaat.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
