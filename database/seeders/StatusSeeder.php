<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            ['id' => 1, 'title' => 'Alta'],
            ['id' => 2, 'title' => 'Baixa'],
            ['id' => 3, 'title' => 'Aguardar'],
            ['id' => 4, 'title' => 'Pendente Assinatura'],
            ['id' => 5, 'title' => 'Dados KO'],
        ]);
    }
}
