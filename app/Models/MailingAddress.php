<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingAddress extends Model
{
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
}
