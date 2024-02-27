<?php

namespace App\Models;

use App\Models\Contract;
use App\Models\User;
use App\Models\MailingAddress;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\Cae;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'cae',
        'administrator_name',
        'condominium_administrator',
        'name',
        'address',
        'door',
        'floor',
        'post_code',
        'dmp_code',
        'parish_id',
        'municipality_id',
        'district_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mailingAddress()
    {
        return $this->hasOne(MailingAddress::class, 'client_id');
    }

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

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'client_id');
    }

    public function caee()
    {
        return $this->belongsTo(Cae::class, 'cae_id');
    }
}
