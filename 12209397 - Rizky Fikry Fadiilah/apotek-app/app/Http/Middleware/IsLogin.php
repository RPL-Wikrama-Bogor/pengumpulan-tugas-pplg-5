<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Support\Facades\Cacheonent\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            return $next($request);
        } else {
            return redirect()->route('login')->with('failed', 'Anda belum login. Silahkan login terlebih dahulu');
        }
    }
}
