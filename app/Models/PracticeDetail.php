<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeDetail extends Model
{
    use HasFactory;
 
    public $timestamps = false;
    protected $table = 'practice_details';
    protected $fillable = [
        'practice_id',
        'practiceType',
        'positionType',
        'patientVolume',
        'treat',
        'workingHours',
        'location',
        'language',
        'amount',
        'procedureType',
        'qualities'
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
