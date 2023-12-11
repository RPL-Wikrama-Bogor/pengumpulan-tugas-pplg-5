<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use  Illuminate\Support\Facades\Auth;
class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
          return $next($request);
        }else{
            //kalau belum ada data login dibalikan ke halamam route name login dengan session failedwe
            return redirect()->route('login')->with('failed', 'anda belum login , silakan login terlebih dahulu');
        }
    }
}
