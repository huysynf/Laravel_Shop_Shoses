<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegister;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelComeNewCustomer
{

    public function __construct()
    {
        //
    }

    public function handle(NewCustomerHasRegister $event)
    {
        Mail::to($event->user->email)->send(new WelcomeNewUserMail());
    }
}
