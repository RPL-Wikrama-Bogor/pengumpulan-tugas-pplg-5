<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

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
            //diperbolehkan untuk akses ke route terkait
            return $next($request);
        }else{
            //kalau belum ada ata logn dibalikike ke halaman route name logim dengan session failed
            return redirect()->route('login')->with('failed','Anda belum login.Silahkan login terlebih dahulu!');

        }
    }
}
    