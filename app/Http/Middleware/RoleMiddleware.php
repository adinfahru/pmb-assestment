<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, string $role)
    {
        // Check if the user is authenticated and has the correct role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect if not authorized
        return redirect('/dashboard')->with('error', 'You do not have access to this section.');
    }
}
