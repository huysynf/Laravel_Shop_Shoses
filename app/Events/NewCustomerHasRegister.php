<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCustomerHasRegister
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $customer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $customer)
    {
        //
        $this->customer = $customer;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
