<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;

class WelcomeNewCustomerListener
{
  
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());

    }
}   
