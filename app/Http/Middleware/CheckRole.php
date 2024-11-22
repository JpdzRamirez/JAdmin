<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, Int $role): Response
    {   
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            // Redirige o responde con un error si el usuario no tiene el rol adecuado
            return redirect()->route('unauthorized.dashboard');
        }
        return $next($request);
    }
}
