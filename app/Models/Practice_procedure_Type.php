<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_procedure_Type extends Model
{
    use HasFactory;

    protected $table = 'practice_procedure__types';
    protected $fillable = [
              'procedure__Type'
    ];
}
