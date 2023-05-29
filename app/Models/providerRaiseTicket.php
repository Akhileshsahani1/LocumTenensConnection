<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ProviderMail;
class providerRaiseTicket extends Model
{
    use HasFactory;
    protected $table = 'providerRaiseTicket';
    //protected $primaryKey = 'ticketId';

    
    protected $fillable = [
        'ticketId',
        'provider_id',
        'ticketTitle',
        'ticketDescription',
        'attachFile',
        'ticketStatus'
        
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        //   'attachFile' => 'array'
        
    ];
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "gopal.kumar@team.cliffex.com";
            Mail::to($adminEmail)->send(new ProviderMail($item));
        });
    }
}
