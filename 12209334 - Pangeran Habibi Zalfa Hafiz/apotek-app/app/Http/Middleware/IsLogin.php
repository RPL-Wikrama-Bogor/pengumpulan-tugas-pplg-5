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
       if (Auth::check()) { 
            //dibolehkan untuk ases ke route terkaait
            return $next($request);
       } else {
        //kalau belum ada data login di balikin ke halaaman route name login dengan session failed
        return redirect()->route('login')->with('failed','Anda belum login. Silahkan login terlebih dahulu');
       }
    }
}
