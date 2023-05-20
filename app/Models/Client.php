<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cae',
        'name',
        'address',
        'door',
        'floor',
        'post_code',
        'Freguesia',
        'Conselho',
        'district_id',
    ];
}
