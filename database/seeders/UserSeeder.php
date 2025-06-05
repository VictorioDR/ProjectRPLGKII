<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user lama jika sudah ada
        DB::table('users')->whereIn('email', ['admin@gmail.com', 'user@gmail.com'])->delete();

        // Tambahkan user baru
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1'),
                'role' => 'admin',
                'is_active' => true,
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user1'),
                'role' => 'user',
                'is_active' => true,
            ]
        ]);
    }
}
