<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'district_id',
    ];
    public $timestamps = false;
}
