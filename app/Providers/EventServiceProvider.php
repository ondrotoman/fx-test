<?php

namespace App\Providers;

use App\Events\Card\Created;
use App\Events\Card\Updated;
use App\Listeners\FailedLogin;
use Illuminate\Auth\Events\Login;
use App\Listeners\SuccessfulLogin;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Registered;
use App\Listeners\CardSuccessfulyCreated;
use App\Listeners\CardSuccessfulyUpdated;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Failed::class => [
            FailedLogin::class,
        ],
        Login::class => [
            SuccessfulLogin::class,
        ],
        Created::class => [
            CardSuccessfulyCreated::class,
        ],     
        Updated::class => [
            CardSuccessfulyUpdated::class,
        ]
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
