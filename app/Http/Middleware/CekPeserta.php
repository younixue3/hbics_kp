<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CekPeserta
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
        if (Auth::User()->role != 'peserta') {
            abort(404);
        }
        return $next($request);
    }
}
