<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengumuman')->insert([
            [
                'judul' => 'Kebaktian Pemuda Bulan Ini',
                'isi' => 'Kebaktian pemuda akan diadakan pada Sabtu malam di aula utama. Diharapkan seluruh pemuda hadir.',
                'tanggal_mulai' => Carbon::now()->subDays(2)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(5)->toDateString(),
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Perayaan Ulang Tahun GKII',
                'isi' => 'GKII Tanjung Selor akan merayakan ulang tahun gereja pada tanggal 1 Juni 2025 dengan ibadah gabungan.',
                'tanggal_mulai' => Carbon::now()->addDays(3)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(7)->toDateString(),
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pengumuman Tidak Aktif (Testing)',
                'isi' => 'Ini adalah pengumuman nonaktif yang hanya digunakan untuk testing.',
                'tanggal_mulai' => Carbon::now()->subDays(10)->toDateString(),
                'tanggal_selesai' => Carbon::now()->subDays(5)->toDateString(),
                'aktif' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
