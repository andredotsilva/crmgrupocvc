<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plans')->insert([
            ['id' => 1, 'provider_id' => 1, 'title' => 'Milan'],
            ['id' => 2, 'provider_id' => 2, 'title' => 'Milan'],
            ['id' => 3, 'provider_id' => 3, 'title' => 'Energia do Condominio'],
            ['id' => 4, 'provider_id' => 5, 'title' => 'Energia do Condominio'],
            ['id' => 6, 'provider_id' => 1, 'title' => 'Roma'],
            ['id' => 7, 'provider_id' => 2, 'title' => 'Roma'],
            ['id' => 8, 'provider_id' => 6, 'title' => 'Energia do Condominio'],
        ]);
    }
}
