<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passwordResetAdmin extends Model
{
    use HasFactory;

    public $table = 'password_reset_admins';
    public $timestamps = false;
    protected $primaryKey = 'email';

    protected $fillable =[
        'email',
        'token',
        'created_at'
    ];
}
