<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JemaatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jemaat')->insert([
            [
                'nama' => 'Yohanes Lontaan',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1995-06-12',
                'alamat' => 'Jl. Jeruk No. 5, Tanjung Selor',
                'telepon' => '081234567890',
                'email' => 'yohanes@example.com',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maria Simorangkir',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1988-02-25',
                'alamat' => 'Jl. Mangga, RT 3',
                'telepon' => '082345678901',
                'email' => 'maria@example.com',
                'status' => 'pindah',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
