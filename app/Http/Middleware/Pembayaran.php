<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pembayaran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->bukti_pembayaran == null || Auth::user()->pembayaran == 'unverified') {
            return redirect(route('bukti_pembayaran'));
        }
        return $next($request);
    }
}
