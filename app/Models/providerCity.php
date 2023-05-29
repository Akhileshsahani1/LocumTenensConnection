<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providerCity extends Model
{
    use HasFactory;
    protected $table = 'providerCity';

    protected $fillable = [
        'id',
        'city',
        'state_id'    
    ];
}
