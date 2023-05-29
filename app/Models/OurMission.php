<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurMission extends Model
{
    use HasFactory;

    protected $table = 'our_missions';

    protected $fillable = [
        'our_mission_contents',
        'dentalpractice_para_first',
        'dentalpractice_search',
        'dentalpractice_schedule',
        'dentalpractice_book',
        'dentalpractice_review',
        'dentalprofessional_para_first',
        'dentalprofessional_profile',
        'dentalprofessional_schedule',
        'dentalprofessional_accept',
        'dentalprofessional_getpaid',
        'dentalprofessional_review'
    ];

}
