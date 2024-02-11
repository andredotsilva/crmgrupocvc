<?php

namespace App\Imports;

use App\Models\CPE;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Parish;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;


/**
 * Summary of DistrictsImport
 */
class CPEImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

            $districtCode = $row['distrito_cod'];
    
            if (!is_numeric($districtCode) || $districtCode < 1 || $districtCode > 22) {
                 $defaultDistrictId = 3094;
                $district = District::where('id', $defaultDistrictId)->first();
            } else {
                $district = District::where('code', $districtCode)->first();
            }
            // $district = District::where('code', $row['distrito_cod'])->first();
    
    
            if($row['concelho_cod'] == 3094) {
                $municipality = Municipality::where('id', 3094)->first();
            }else {
                $ultimosDoisDigitos = substr($row['concelho_cod'], -2);
        
                $digitoEsquerda = substr($ultimosDoisDigitos, 0, 1);
        
                if ($digitoEsquerda == 0) {
                    $comparar = substr($ultimosDoisDigitos, -1);
                } else {
                    $comparar = $ultimosDoisDigitos;
                }
        
                $municipality = Municipality::where('code', $comparar)->where('district_id', $district->id)->first();
            }
    
            return new Cpe([
                'cpe' => $row['cpe'],
                'name' => $row['nome'],
                'nif' => substr($row['nipc'], 2),
                'address' => $row['rua'],
                'door' => $row['porta'],
                'post_code' => $row['postal_cod'],
                'power' => $row['pot_contratada2'] ?? null,
                'tariff' => $row['nivel_tensao'],
                'floor' => $row['andar_fracao'],
                'district_id' => $district->id,
                'municipality_id' => $municipality->id,
                'parish_id' => null,
    
            ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
