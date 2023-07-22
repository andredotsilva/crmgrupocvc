<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'tariff_id',
        'powerbracket_id',
        'nif',
        'cpe',
        'power',
        'flat',
        'peak',
        'standard',
        'off_peak',
        'super_off_peak',
        'gas'
    ];

    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }

    public function powerbracket()
    {
        return $this->belongsTo(PowerBracket::class, 'powerbracket_id');
    }
}
