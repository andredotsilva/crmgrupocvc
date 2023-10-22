<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpe',
        'name',
        'nif',
        'district_id',
        'municipality_id',
        'parish_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class, 'parish_id');
    }
}
