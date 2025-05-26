<?php

namespace Database\Seeders;

use App\Models\JadwalIbadah;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JadwalIbadahSeeder extends Seeder
{
    public function run(): void
    {
        JadwalIbadah::insert([
            [
                'judul' => 'Ibadah Minggu I',
                'tanggal' => Carbon::now()->addDays(3)->toDateString(),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '10:00:00',
                'tempat' => 'Gereja Utama',
                'tema' => 'Hidup dalam Kasih',
                'pengkhotbah' => 'Pdt. Yohanes',
                'deskripsi' => 'Ibadah minggu pertama di bulan ini.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Ibadah Jumat',
                'tanggal' => Carbon::now()->subDays(2)->toDateString(),
                'waktu_mulai' => '18:00:00',
                'waktu_selesai' => '20:00:00',
                'tempat' => 'Ruang Ibadah B',
                'tema' => 'Syukur dalam Pencobaan',
                'pengkhotbah' => 'Ev. Linda',
                'deskripsi' => 'Ibadah penguatan rohani hari Jumat.',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
