<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Summary of DistrictsImport
 */
class MunicipalitiesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $district = District::where('code', $row['0'])->first();


        return new Municipality([
            'code' => $row[2],
            'title' => $row[3],
            'district_id' => $district->id
        ]);
    }
}
