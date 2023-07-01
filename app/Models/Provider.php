<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'acronym',
        'title',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
