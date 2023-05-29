<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Admin;
use Mail;

class SendMailFired
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMail $event): void
    {
        $user = Admin::find($event->id)->toArray();
        Mail::send('eventMail', $user, function($message) use ($user){
            $message->to($user['email']);
            $message->subject('Contact Submit');
        });
    }
}
