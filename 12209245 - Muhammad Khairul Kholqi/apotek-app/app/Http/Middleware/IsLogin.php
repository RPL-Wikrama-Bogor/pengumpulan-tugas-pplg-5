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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // kalau sudah ada data login
        if(Auth::check()) {
            return $next($request);
        } else {
            // kalau belum ada data login dibalikin ke halaman route name login dengan session failed
            return redirect()->route('login')->with('failed', 'Anda belum login. Silahkan login dahulu!');
        }
    }
}
