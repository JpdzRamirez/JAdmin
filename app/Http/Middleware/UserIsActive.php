<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y si está activo
        if (Auth::check() && Auth::user()->active != 1) {
            // Si el usuario no está activo, cierra la sesión y redirige
            Auth::guard('web')->logout(); // Cierra la sesión del usuario
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirige a la página de cuenta suspendida con un mensaje de error
            return redirect('/account-suspended')->withErrors([
                'account-dissabled' => __('auth.account-suspeded-paragraf')
            ]);
        }

        return $next($request);
    }
}