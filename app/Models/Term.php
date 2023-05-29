<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'terms';
    protected $fillable = [
        'practice_id','terms_service','privacy_Policy','payment_Methods','liability'
    ];
}
