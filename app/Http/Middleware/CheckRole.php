<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
  public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {
        switch (true) {
            case Auth::user()->hasRole('minister'):
                return redirect()->route('minister');
            case Auth::user()->hasRole('permsec'):
                return redirect()->route('permsec');
            default:
                return redirect()->intended('/home');
        }
    }

    // Handle the case where the user is not authenticated.
    // You might want to add additional logic or redirect accordingly.
    return redirect('/login');
}

}
