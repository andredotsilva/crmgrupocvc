<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Municipality;
use App\Models\Parish;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Summary of DistrictsImport
 */
class ParishesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $municipality = Municipality::where('title', $row[3])->first();

        return new Parish([
            'code' => $row[4],
            'title' => $row[5],
            'municipality_id' => $municipality->id
        ]);
    }
}
