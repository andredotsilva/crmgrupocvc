<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'cae',
        'administrator_name',
        'condominium_administrator',
        'name',
        'address',
        'door',
        'floor',
        'post_code',
        'dmp_code', //district_municipality_parish_code
        'parish_id',
        'municipality_id',
        'district_id',
    ];
}
