<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
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
        // slack notifical to admin
        dump('slack message here');
    }
}
