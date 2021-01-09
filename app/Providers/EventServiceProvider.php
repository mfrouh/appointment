<?php

namespace App\Providers;

use App\Events\BookingSuccessEvent;
use App\Events\BookingVerifyEvent;
use App\Listeners\BookingSuccessListener;
use App\Listeners\BookingVerifyListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        BookingSuccessEvent::class => [
            BookingSuccessListener::class,
        ],
        BookingVerifyEvent::class => [
            BookingVerifyListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
