<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TariffSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tariffs')->insert([
            [
                'id' => 1,
                'title' => 'MT',
                'description' => 'Media tensão',
            ],
            [
                'id' => 2,
                'title' => 'AT',
                'description' => 'Alta tensão',
            ],
            [
                'id' => 3,
                'title' => 'BTN',
                'description' => 'Baixa Tensão Normal',
            ],
            [
                'id' => 4,
                'title' => 'BTE',
                'description' => 'Baixa Tensão Especial',
            ],
        ]);
    }
}
