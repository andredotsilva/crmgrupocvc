<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\MunicipalitySeeder;
use Database\Seeders\ParishSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            /*RolesTableSeeder::class,
            StatusSeeder::class,
            DistrictSeeder::class,       // cria os distritos primeiro
            MunicipalitySeeder::class,   // depois os municípios
            ParishSeeder::class, */
            TariffSeeder::class,
            ServiceSeeder::class, 
            PowerBracketSeeder::class,
            ProviderSeeder::class,
            PlanSeeder::class,
        ]);
        
    }
}
