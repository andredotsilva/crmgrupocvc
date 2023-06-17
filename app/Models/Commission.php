<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasUlids;

    protected $fillable = [
        'cvc_paid_amount',
        'administrator_paid_amount',
        'commercial_paid_amount',
        'cvc_payment_date',
        'administrator_payment_date',
        'commercial_payment_date',
        'refund_cvc_paid_ammount',
        'refund_administrator_paid_ammount',
        'refund_commercial_paid_ammount',
        'refund_cvc_payment_date',
        'refund_adminstrator_payment_date',
        'refund_commercial_payment_date'
    ];
}
