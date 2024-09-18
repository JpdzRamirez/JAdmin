<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Limitar intentos de login
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        // Limitar intentos de verificación de dos factores
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Autenticación personalizada con redirección en función del rol
        Fortify::authenticateUsing(function (Request $request) {
            $user = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($user) {
                $user = Auth::user(); // Obtener usuario autenticado

                // Redirigir según el rol del usuario
                if ($user->role == 1) {
                    return Redirect::to('/admin/dashboard');
                } elseif ($user->role == 2) {
                    return Redirect::to('/casher/dashboard');
                } elseif ($user->role == 3) {
                    return Redirect::to('/waiter/dashboard');
                } elseif ($user->role == 4) {
                    return Redirect::to('/customer/dashboard');
                }

                // Ejemplo: Verificar otro campo, como estado activo
                if (!$user->is_active) {
                    Auth::logout();
                    return Redirect::to('/account-suspended');
                }

                return $user; // Autenticación exitosa, continuar proceso
            }

            return null; // Retorna null en caso de autenticación fallida
        });
    }
}
