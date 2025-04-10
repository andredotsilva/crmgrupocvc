<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            ['id' => 1, 'title' => 'Novo Contrato'],
            ['id' => 2, 'title' => 'Ligações á Rede'],
            ['id' => 3, 'title' => 'Contador de Obras'],
            ['id' => 4, 'title' => 'Alterações Contratuais'],
            ['id' => 5, 'title' => 'Manutenção de Gás'],
            ['id' => 6, 'title' => 'Inspeção de Gás'],
        ]);
    }
}
