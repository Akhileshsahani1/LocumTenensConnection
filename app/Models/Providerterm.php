<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Providerterm extends Model
{
    use HasFactory;

    protected $table = 'providerterms';
    protected $fillable = [
        'provider_id',
        'terms_service',
        'privacy_policy',
        'payment_methods',
        'liability'
    ];
}
