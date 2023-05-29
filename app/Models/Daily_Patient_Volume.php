<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_Patient_Volume extends Model
{
    use HasFactory;
    protected $table = 'daily__patient__volumes';
    protected $fillable =[
        'patient_volume'
    ];
}
