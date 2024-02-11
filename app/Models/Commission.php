<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasUlids;

    protected $fillable = [
        'administrator_paid_amount',
        'commercial_paid_amount',
        'cvc_paid_amount',
        'energy_cvc_paid_amount',

        'administrator_payment_date',
        'commercial_payment_date',
        'cvc_payment_date',
        'energy_cvc_payment_date',

        'refund_cvc_paid_amount',
        'refund_administrator_paid_amount',
        'refund_commercial_paid_amount',
        'refund_energy_cvc_paid_amount',

        'refund_cvc_payment_date',
        'refund_administrator_payment_date',
        'refund_commercial_payment_date',
        'refund_energy_cvc_payment_date'

  
    ];
}
