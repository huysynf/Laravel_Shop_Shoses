<?php

namespace App\Listeners;

use App\Events\Ordershipped;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipmentNotification implements ShouldQueue
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Ordershipped  $event
     * @return void
     */
    public function handle(Ordershipped $event)
    {
        dd($event->order);
    }

    public function failed(Ordershipped $event, $exception)
    {

    }
}
