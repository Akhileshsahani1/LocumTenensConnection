<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Working_Hour extends Model
{
    use HasFactory;

    protected $table='practice__working__hours';
    protected $fillable=[
            'working_Hours'
    ];
}
