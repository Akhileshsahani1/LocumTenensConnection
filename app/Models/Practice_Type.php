<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Type extends Model
{
    use HasFactory;

    protected $table = 'practice__types';
    protected $fillable = [
        'practice_Type'
    ];
}
