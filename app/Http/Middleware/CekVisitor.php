<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CekVisitor
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
        if (Auth::User()->role == 'pengunjung' || Auth::User()->role == 'peserta') {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
