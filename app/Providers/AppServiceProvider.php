<?php

namespace App\Providers;

use App\Contracts\UserRepositoryInterface;

use App\Repositories\UserRepository;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;


use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;
use App\Contracts\CastServiceInterface;

use App\Services\LocationService;
use App\Services\CastService;

use App\Services\GeoLocationHandler;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registrar las interfaces con su implementación
        //Builder Interfaces
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        //Form API Interfaces
        $this->app->bind(CountryServiceInterface::class, LocationService::class);
        $this->app->bind(StateServiceInterface::class, LocationService::class);
        $this->app->bind(CityServiceInterface::class, LocationService::class);
        $this->app->bind(CastServiceInterface::class, CastService::class);
        //Geolocation Service
        $this->app->singleton(GeoLocationHandler::class, function ($app) {
            return new GeoLocationHandler();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Reemplaza la notificación predeterminada de verificación
        VerifyEmail::toMailUsing(function ($notifiable) {
            return (new CustomVerifyEmail())->toMail($notifiable);
        });
    }
}
