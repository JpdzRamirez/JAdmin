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
        //Authenticate views
        Fortify::loginView(function () {
            return view('auth.authenticate'); // Cambiar a la nueva vista
        });
    
        Fortify::registerView(function () {
            return view('auth.authenticate'); // Cambiar a la nueva vista si también quieres manejar el registro aquí
        });

        //CRUD Users
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
            // Verifica las credenciales
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();

                // Verifica el rol del usuario y redirige
                if ($user->role == 1) {
                    return redirect('/admin/dashboard');
                } elseif ($user->role == 2) {
                    return redirect('/casher/dashboard');
                } elseif ($user->role == 3) {
                    return redirect('/waiter/dashboard');
                } elseif ($user->role == 4) {
                    return redirect('/customer/dashboard');
                }

                // Verifica si el usuario está activo
                if (!$user->is_active) {
                    Auth::logout();
                    return redirect('/account-suspended')->withErrors(['account' => 'Tu cuenta ha sido suspendida.']);
                }

                return $user; // Autenticación exitosa
            }

            // Autenticación fallida, devolver mensaje de error
            return redirect()->back()->withErrors(['login' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);
        });
    }
}
