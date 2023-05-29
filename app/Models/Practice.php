<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Practice extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $primeryKey = 'id';
    protected $table = 'practices';
    protected $fillable = [
        'firstName',
        'lastName',
        'bio',
        'clinicName',
        'email',
        'phoneNumber',
        'password',
        'state',
        'city',
        'zipCode',
        'status',
        'userId',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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
        'email_verified_at' => 'datetime',
    ];


    public function practiceDetails()
    {
         
        return $this->hasOne(PracticeDetail::class);
    }

    public function AdminResolve()
    {
       
        return $this->hasMany(AdminPracticeResolved::class,'practice_id', 'id');
    }
}
