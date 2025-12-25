<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('providers')->insert([
            ['id' => 1, 'acronym' => 'Plenitude', 'title' => 'Tarifa Fixa'],
            ['id' => 2, 'acronym' => 'Plenitude', 'title' => 'Tarifa Indexada'],
            ['id' => 3, 'acronym' => 'Alfa Energia', 'title' => 'Tarifa Fixa'],
            ['id' => 5, 'acronym' => 'Alfa Energia', 'title' => 'Tarifa Indexada'],
            ['id' => 6, 'acronym' => 'Ynerluz', 'title' => 'Tarifa Indexada'],
        ]);
    }
}
