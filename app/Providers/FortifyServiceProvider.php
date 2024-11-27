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

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Fortify;
use App\Models\User;


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
            session()->flash('register', true); // Añade la variable de sesión            
            return view('auth.authenticate'); // Cambiar a la nueva vista si también quieres manejar el registro aquí
        });

        //CRUD Users
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Limitar intentos de login
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

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
                return $user; // Devuelve el usuario si la autenticación es exitosa
            }

            // Autenticación fallida, devolver mensaje de error
            // return redirect()->back()->withErrors(['login' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);
            return null; // Devuelve null si las credenciales son incorrectas
        });

        // Redirección después del login según el rol
        Fortify::redirects('login', function () {
            $user = Auth::user();

            if (!$user) {
                return route('login'); // En caso de error, redirigir al login
            }

            switch ($user->role) {
                case 1:
                    return route('pos-register.dashboard');
                case 2:
                    return route('admin.dashboard');
                case 3:
                    return route('doctor.dashboard');
                case 4:
                    return route('assistant.dashboard');
                case 5:
                    return route('customer.dashboard');
                default:
                    return route('main.dashboard');
            }
        });
        // Redirige según el rol después del registro
        Event::listen(Registered::class, function ($event) {
            // Vuelve a consultar el usuario para asegurar que el rol esté actualizado
            $user = User::find($event->user->id);
            if (!$user->hasVerifiedEmail()) {
                // Redirige a la página de solicitud de verificación
                Redirect::setIntendedUrl('/email/verify-prompt');
            }
        });
    }
}
