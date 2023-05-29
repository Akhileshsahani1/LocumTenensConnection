<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Provider extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = "providers";
    protected $guard = "provider";
    protected $fillable = [
        //step 1 
        'firstName','lastName','email' ,'token','is_verified','password','phone','city','state','zipcode',
        //step 2 
        'practitioner_Type','position_Type','start_Date','end_Date','primary_Handedness','distance_Willing_To_Travel_One_Way','peferred_Daily_Working_Hours',
         //step 3 
        'preferred_Daily_Patient_Volume','are_You_Willing_Overnight','professional_Experience','booking_Availability_Requirements','daily_Needs','special_Needs','preferred_Region',
         //step 4
        'available_Days','procedure_Type','advanced_Degree_Licences','comfortable_Treating_Children','qualities_Practice_Environment','average_Daily_Rate','average_hour_rate',
         //step 5
        'upload_Photo','Virginia_Dental_File','malpractices_Certificate','dea_License','description','subscription','status','userId'
    ];
    // 
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        // 'preferred_Region' => 'array',
        // 'available_Days' => 'array',
        // 'procedure_Type' => 'array',
        // 'advanced_Degree_Licences' => 'array',
        // 'dea_License'  => 'array',
      
       
    ];
}
