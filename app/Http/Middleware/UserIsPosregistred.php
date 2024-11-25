<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsPosregistred
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
        // Verifica si el usuario está autenticado y si está activo verificamos preregistro
        if (Auth::check() && Auth::user()->role == 1) {
            // Si el usuario no ha completado los datos complementarios
            $user = Auth::user();
            // Redirige a la página de cuenta suspendida con un mensaje de error
            return redirect()->route('pos-register.dashboard')->with([
                'user'=> $user,
            ]);
        }

        return $next($request);
    }
}