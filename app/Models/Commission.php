<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'cvc_paid_amount',
        'administrator_paid_amount',
        'commercial_paid_amount',
        'cvc_payment_date',
        'administrator_payment_date',
        'commercial_payment_date'
    ];
}
