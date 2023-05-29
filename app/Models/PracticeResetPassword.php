<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeResetPassword extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $table = 'practice_reset_passwords';
    protected $fillable = ['email','token'];
}
