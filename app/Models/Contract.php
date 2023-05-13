<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'bo_id',
        'client_id',

        // Datas de contrato
        'inserted_at',
        'signed_at',
        'effective_at',
        'renewal_at',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    protected static function booted(): void
    {
        if (auth()->check() && auth()->user()->is_client) {
            static::addGlobalScope('client', function (Builder $builder) {
                $builder->where('client_id', auth()->id());
            });
        }
    }
}
