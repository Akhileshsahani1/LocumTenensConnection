<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProviderTicketResolved extends Model
{
    use HasFactory;

    protected $table = 'admin_provider_ticket_resolveds';

    protected $fillable = [
        'provider_id',
        'ticket_id',
        'issue',
        'admin_message',
        'screenshort',
        'provider_resolved_status'
    ] ;
}
