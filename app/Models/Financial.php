<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $fillable = [
        'contract_id',
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
        'refund_energy_cvc_payment_date',
    ];

    // Relationship with Contract
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
