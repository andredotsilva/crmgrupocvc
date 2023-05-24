<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'bo_id',
        'comercial_id',
        'client_id',
        'client_type_id',
        'category_id',
        'service_id',

        // Datas de contrato
        'inserted_at',
        'signed_at',
        'effective_at',
        'renewal_at',

        // FORMA DE PAGAMENTO
        'nib',
        'invoice_type_id',

        // ASSINATURA
        'signatory_email',
        'signatory_phone',


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
