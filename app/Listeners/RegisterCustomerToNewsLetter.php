<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCustomerToNewsLetter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegister  $event
     * @return void
     */
    public function handle(NewCustomerHasRegister $event)
    {
        //resiter new letter
        dump('register new letter');
    }
}
