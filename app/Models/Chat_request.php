<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_request extends Model
{
    use HasFactory;
    protected $table = 'chat_requests';
    protected $fillable = ['from_user_id', 'to_user_id', 'status'];
}
