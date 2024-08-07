<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // User is not authenticated
            return redirect()->route('login'); // Redirect to login route
        }

        return $next($request);
    }
}
