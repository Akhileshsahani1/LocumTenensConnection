<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeRaseTicket extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $table = 'practice_rase_tickets';
    protected $fillable =[
           'practice_id','Ticket_ID','Issue','Issue_Date','message','screenShort','filePath','practice_raise_tickets_status'
       ];
}
