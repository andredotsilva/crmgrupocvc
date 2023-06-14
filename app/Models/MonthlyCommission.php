<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyCommission extends Model
{
    use HasUlids;
    use HasFactory;

    protected $fillable = [
        "amount_01_12",
        "amount_02_12",
        "amount_03_12",
        "amount_04_12",
        "amount_05_12",
        "amount_06_12",
        "amount_07_12",
        "amount_08_12",
        "amount_09_12",
        "amount_10_12",
        "amount_11_12",
        "amount_12_12"
    ];
}
