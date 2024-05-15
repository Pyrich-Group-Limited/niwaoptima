<?php

namespace Modules\HumanResource\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user=$request->user();

        if (!$user || !$user->hasRole($roles)) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
