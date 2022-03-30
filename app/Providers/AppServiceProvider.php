<?php

namespace App\Providers;

use App\Src\Card\Issuers\Visa;
use App\Actions\Card\CardPayment;
use App\Src\Contracts\CardIssuer;
use App\Actions\CreateActivityLog;
use App\Actions\Card\CreateNewCard;
use App\Src\Contracts\CardPayments;
use App\Actions\Card\UpdateCardName;
use App\Src\Contracts\CreateNewCards;
use App\Src\Contracts\UpdateCardNames;
use Illuminate\Support\ServiceProvider;
use App\Src\Contracts\CreateActivityLogs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CreateNewCards::class, CreateNewCard::class);
        $this->app->bind(UpdateCardNames::class, UpdateCardName::class);
        $this->app->bind(CreateActivityLogs::class, CreateActivityLog::class);
        $this->app->bind(CardPayments::class, CardPayment::class);
        $this->app->bind(CardIssuer::class, Visa::class);
    }
}
