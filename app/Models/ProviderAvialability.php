<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderAvialability extends Model
{ 
    use HasFactory;
    protected $fillable = [
        'event_name', 
        'event_start', 
        'event_end',
        'bookingid',
        'color',
        'status',
        'userid'
    ];
}
