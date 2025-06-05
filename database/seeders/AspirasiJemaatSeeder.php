<?php

namespace Database\Seeders;

use App\Models\AspirasiJemaat;
use Illuminate\Database\Seeder;

class AspirasiJemaatSeeder extends Seeder
{
    public function run(): void
    {
        AspirasiJemaat::insert([
            [
                'jemaat_id' => null,
                'nama' => 'Andi T.',
                'email' => 'andi@example.com',
                'aspirasi' => 'Mohon doa untuk keluarga kami.',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jemaat_id' => null,
                'nama' => 'Maria S.',
                'email' => 'maria@example.com',
                'aspirasi' => 'Usul pengadaan kegiatan ibadah keluarga rutin.',
                'status' => 'reviewed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
