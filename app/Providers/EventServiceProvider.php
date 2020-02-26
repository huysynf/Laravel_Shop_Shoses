<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegister;
use App\Events\OrderPayment;
use App\Events\OrderShipped;
use App\Listeners\SendShipmentNotification;
use App\Listeners\SentEmailAfterOrderPayment;
use App\Listeners\WelComeNewCustomer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderPayment::class => [
            SentEmailAfterOrderPayment::class,
        ],
        OrderShipped::class=>[
            SendShipmentNotification::class,
        ],
        NewCustomerHasRegister::class=>[
            WelComeNewCustomer::class,
            \App\Listeners\RegisterCustomerToNewsLetter::class,
            \App\Listeners\NotifyAdminViaSlack::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
