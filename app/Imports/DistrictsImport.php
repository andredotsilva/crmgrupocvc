<?php

namespace App\Imports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Summary of DistrictsImport
 */
class DistrictsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new District([
        //     'code' => $row['code'],
        //     'title' => $row['title'],
        // ]);

        return new District([
            'code' => $row[0],
            'title' => $row[1],
        ]);
    }
}
