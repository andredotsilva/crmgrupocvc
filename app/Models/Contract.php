<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contract_date',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
