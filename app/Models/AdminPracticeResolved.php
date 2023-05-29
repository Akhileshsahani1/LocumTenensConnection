<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPracticeResolved extends Model
{
    use HasFactory;

    protected $table = 'admin_practice_resolveds';
    protected $fillable =[
           'practice_id','ticket_id','issue','issue_date','admin_message','screenshort','practice_resolved_status'
       ];
}
