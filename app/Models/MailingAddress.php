<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'door',
        'post_code',
        'parish_id',
        'municipality_id',
        'district_id',
        'email',
        'phone_number',
        'nif',
        'client_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class, 'parish_id');
    }
}
