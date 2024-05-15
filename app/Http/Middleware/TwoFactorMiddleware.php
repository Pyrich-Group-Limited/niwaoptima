<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $two_factor_expires_at = Carbon::parse($user->two_factor_expires_at);
        $current_time = Carbon::now();

        if (auth()->check() && $user->two_factor_code) {
            if ($two_factor_expires_at->lessThan($current_time)) {
                auth()->logout();
                return redirect()->route('login')
                    ->withErrors(['email' => 'Your verification code expired. Please re-login.']);
            }
            if (!$request->is('verify*')) {
                return redirect()->route('verify.index');
            }
        }
        return $next($request);
    }
}
