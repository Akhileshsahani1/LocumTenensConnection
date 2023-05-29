<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Location extends Model
{
    use HasFactory;
    protected $table='practice__locations';
    protected $fillable=[
        'Location'
    ];
}
