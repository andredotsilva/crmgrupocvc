<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentationStatus extends Model
{
    protected $fillable = [
        'nomenclature',
        'description',
    ];
}
