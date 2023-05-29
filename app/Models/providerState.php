<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providerState extends Model
{
    use HasFactory;
    protected $table = 'providerState';

    protected $fillable = [
        'id',
        'state'    
    ];
}
