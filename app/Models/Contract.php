<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;

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
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function backofficer()
    {
        return $this->belongsTo(User::class, 'back_officer_id');
    }

    public function commercialId() {
        return $this->belongsTo(User::class, 'commercial_id');
    }

    public function commercialName() {
        return $this->belongsTo(User::class, 'commercial_id');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function solutions() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function clientType() {
        return $this->belongsTo(ClientType::class, 'client_type_id');
    }

    public function provider() {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function documentation() {
        return $this->belongsTo(DocumentationStatus::class, 'documentation_status_id');
    }

    public function archive() {
        return $this->belongsTo(Contract::class, 'contract_id'); // ERRO
    }

    public function nif() {
        return $this->belongsTo(Meter::class, 'meter_id'); 
    }

    public function consumos() {
        return $this->belongsTo(Meter::class, 'meter_id'); 
    }

    public function clientData() {
        return $this->belongsTo(Client::class, 'client_id'); 
    }

    public function municipality() {
        return $this->belongsTo(Municipality::class, 'municipality_id'); // ERRO
    }

    public function district() {
        return $this->belongsTo(District::class, 'district_id'); // ERRO
    }

    public function parish() {
        return $this->belongsTo(Parish::class, 'parish_id'); // ERRO
    }

    public function invoiceType() {
        return $this->belongsTo(InvoiceType::class, 'invoice_type_id');
    }

    public function commission() {
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    public function monthlyCommission() {
        return $this->belongsTo(MonthlyCommission::class, 'monthly_commission_id');
    }

    public function mailingAddress() {
        return $this->belongsTo(Client::class, 'mailing_address_id');
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
