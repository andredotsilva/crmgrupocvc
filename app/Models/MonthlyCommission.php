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
        "date_01_12",
        "amount_02_12",
        "date_02_12",
        "amount_03_12",
        "date_03_12",
        "amount_04_12",
        "date_04_12",
        "amount_05_12",
        "date_05_12",
        "amount_06_12",
        "date_06_12",
        "amount_07_12",
        "date_07_12",
        "amount_08_12",
        "date_08_12",
        "amount_09_12",
        "date_09_12",
        "amount_10_12",
        "date_10_12",
        "amount_11_12",
        "date_11_12",
        "amount_12_12",
        "date_12_12",
    ];
}
