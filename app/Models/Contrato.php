<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'contador',
        'name',
        'nif',
        'email',
        'cod_freguesia',
        'freguesia',
        'concelho',
        'distrito',
        'morada',
        'postal',
        'tensao',
        'potencia',
        'andar'
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
