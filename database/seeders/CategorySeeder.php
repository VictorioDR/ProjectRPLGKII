<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Category A',
                'description' => 'Description For Category A',
            ],
            [
                'name' => 'Category B',
                'description' => 'Description For Category B',
            ],
            [
                'name' => 'Category C',
                'description' => 'Description For Category C',
            ],
        ]);
    }
}
