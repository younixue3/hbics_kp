<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::User()->role != 'admin' && Auth::User()->role != 'superadmin') {
            abort(404);
        }
        return $next($request);
    }
}
