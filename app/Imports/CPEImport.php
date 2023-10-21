<?php

namespace App\Imports;

use App\Models\CPE;
use App\Models\District;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

/**
 * Summary of DistrictsImport
 */
class CPEImport implements ToModel, ShouldQueue, WithBatchInserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Cpe([
            'cpe' => $row[0],
            'name' => $row[1],
            'nif' => $row[2]
        ]);
    }

    public function batchSize(): int
    {
        return 5000; // Especifique o tamanho do lote desejado.
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
