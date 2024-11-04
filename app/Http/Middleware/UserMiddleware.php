<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and has role `2` (user)
        if (Auth::check() && Auth::user()->role === 2) {
            return $next($request);
        }

        // Redirect if not a regular user
        return redirect('/')->with('error', 'You do not have user access.');
    }
}

