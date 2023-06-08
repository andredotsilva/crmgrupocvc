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
        'back_officer_id',
        'commercial_id',
        'client_id',
        'client_type_id',
        'category_id',
        'service_id',
        'documentation_status_id',
        'archive',

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

    public function meter()
    {
        return $this->belongsTo(Meter::class, 'meter_id');
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function files()
    {
        return $this->hasMany(File::class);
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
