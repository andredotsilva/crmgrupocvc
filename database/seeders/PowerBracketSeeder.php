<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerBracketSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('power_brackets')->insert([
            ['id' => 1, 'title' => '1,15'],
            ['id' => 2, 'title' => '2,30'],
            ['id' => 3, 'title' => '3,45'],
            ['id' => 4, 'title' => '4,60'],
            ['id' => 5, 'title' => '5,75'],
            ['id' => 6, 'title' => '6,90'],
            ['id' => 7, 'title' => '10,35'],
            ['id' => 8, 'title' => '13,80'],
            ['id' => 9, 'title' => '17,25'],
            ['id' => 10, 'title' => '20,70'],
            ['id' => 11, 'title' => '27,60'],
            ['id' => 12, 'title' => '34,50'],
            ['id' => 13, 'title' => '41,40'],
            ['id' => 14, 'title' => '41,41'],
            ['id' => 15, 'title' => 'Outro'],
        ]);
    }
}
