<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and has role `1` (admin)
        if (Auth::check() && Auth::user()->role === 1) {
            return $next($request);
        }

        // Redirect if not admin
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}

