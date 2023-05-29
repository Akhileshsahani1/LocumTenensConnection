<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Language extends Model
{
    use HasFactory;
    protected $table = 'practice__languages';
    protected $fillable = [
        'Language'
    ];
}
