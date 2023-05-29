<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeHire extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'practice_hires';
    protected $fillable = [
        'practice_id','provider_id','start_date','end_date'
    ];
}
