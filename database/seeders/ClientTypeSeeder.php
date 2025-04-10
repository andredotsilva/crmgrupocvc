<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('client_types')->insert([
            ['id' => 1, 'title' => 'Condominios'],
            ['id' => 2, 'title' => 'Empresarial'],
            ['id' => 3, 'title' => 'Doméstico'],
        ]);
    }
}
