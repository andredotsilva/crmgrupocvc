<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ["text", "contract_id", "back_officer_id"];

    public function backOfficer()
    {
        return $this->belongsTo(User::class, "back_officer_id");
    }
}
