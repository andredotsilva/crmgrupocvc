<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'title' => 'Eletricidade'],
            ['id' => 2, 'title' => 'Gás'],
            ['id' => 3, 'title' => 'Ambas'],
        ]);
    }
}
