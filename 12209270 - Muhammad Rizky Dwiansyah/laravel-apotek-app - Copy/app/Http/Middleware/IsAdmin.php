<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::user()->role == "admin"){
            //dibolehkan untuk akses ke route terkait
            return $next($request);
        }else{
            // kalau belom ada data login di balikin ke halaman route name login dengan session failed
            return redirect()->route('login')->with('failed', 'Anda Bukan admin');
        }


    }
}