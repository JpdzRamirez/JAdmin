<?php

namespace App\Providers;
use App\Contracts\UserRepositoryInterface;

use App\Repositories\UserRepository;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;

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
