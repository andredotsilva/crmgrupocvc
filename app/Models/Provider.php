<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'plan_id',
        'document_status_id',
        'client_archive'
    ];
}
