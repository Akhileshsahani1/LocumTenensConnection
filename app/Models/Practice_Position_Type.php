<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Position_Type extends Model
{
    use HasFactory;

    protected $table = 'practice_position_type';
    protected $fillable =[
        'position_Type'
    ];
}
