<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('districts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('districts')->insert([
            ['id' => 1, 'code' => '1', 'title' => 'AVEIRO'],
            ['id' => 148, 'code' => '2', 'title' => 'BEJA'],
            ['id' => 223, 'code' => '3', 'title' => 'BRAGA'],
            ['id' => 570, 'code' => '4', 'title' => 'BRAGANCA'],
            ['id' => 796, 'code' => '5', 'title' => 'C BRANCO'],
            ['id' => 916, 'code' => '6', 'title' => 'COIMBRA'],
            ['id' => 1071, 'code' => '7', 'title' => 'EVORA'],
            ['id' => 1140, 'code' => '8', 'title' => 'FARO'],
            ['id' => 1207, 'code' => '9', 'title' => 'GUARDA'],
            ['id' => 1449, 'code' => '10', 'title' => 'LEIRIA'],
            ['id' => 1559, 'code' => '11', 'title' => 'LISBOA'],
            ['id' => 1693, 'code' => '12', 'title' => 'PORTALEGRE'],
            ['id' => 1762, 'code' => '13', 'title' => 'PORTO'],
            ['id' => 2005, 'code' => '14', 'title' => 'SANTAREM'],
            ['id' => 2146, 'code' => '15', 'title' => 'SETUBAL'],
            ['id' => 2201, 'code' => '16', 'title' => 'VIANA DO CASTELO'],
            ['id' => 2409, 'code' => '17', 'title' => 'VILA REAL'],
            ['id' => 2606, 'code' => '18', 'title' => 'VISEU'],
            ['id' => 2883, 'code' => '19', 'title' => 'ANGRA DO HEROISMO'],
            ['id' => 2928, 'code' => '20', 'title' => 'HORTA'],
            ['id' => 2970, 'code' => '21', 'title' => 'PONTA DELGADA'],
            ['id' => 3039, 'code' => '22', 'title' => 'FUNCHAL']
        ]);
    }
}
