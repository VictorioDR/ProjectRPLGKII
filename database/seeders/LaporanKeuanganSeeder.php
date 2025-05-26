<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanKeuanganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laporan_keuangan')->insert([
            [
                'judul' => 'Persembahan Ibadah Minggu',
                'tanggal' => Carbon::now()->subDays(2)->toDateString(),
                'jenis' => 'pemasukan',
                'jumlah' => 2500000,
                'keterangan' => 'Persembahan minggu pertama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pembelian Sound System',
                'tanggal' => Carbon::now()->subDays(1)->toDateString(),
                'jenis' => 'pengeluaran',
                'jumlah' => 1200000,
                'keterangan' => 'Untuk ibadah raya pemuda',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
