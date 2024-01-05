<?php

namespace App\Imports;

// set_time_limit(0);

use App\Models\CPE;
use App\Models\District;
use App\Models\Municipality;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

/**
 * Summary of DistrictsImport
 */
class CPEImport implements ToModel, WithBatchInserts, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $district = District::where('code', $row['distrito_cod'])->first();

        $ultimosDoisDigitos = substr($row['concelho_cod'], -2);

        $digitoEsquerda = substr($ultimosDoisDigitos, 0, 1);

        if ($digitoEsquerda == 0) {
            $comparar = substr($ultimosDoisDigitos, -1);
        } else {
            $comparar = $ultimosDoisDigitos;
        }
        // dd($comparar);
        $municipality = Municipality::where('code', $comparar)->where('district_id', $district->id)->first();

        // dd($municipality);

        return new Cpe([
            'cpe' => $row['cpe'],
            'name' => $row['nome'],
            'nif' => $row['nipc'],
            'district_id' => $district->id,
            'municipality_id' => $municipality->id,
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
