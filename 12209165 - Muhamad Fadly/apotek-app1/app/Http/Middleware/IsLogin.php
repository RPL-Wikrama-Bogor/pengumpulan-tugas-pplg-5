<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
   
    public function handle(Request $request, Closure $next): Response
    {   
        //mengecek kalau udah ada data login
        if (Auth::check()) {
            //di bolehkan untuk akses ke route terkait
            return $next($request);
        }else{
            //kalau belum ada data login di balikan kehalamna route name login dengan session failed
            return redirect()->route('login')->with('failed','anda belum login silahkan login terlebih dahulu');
        }
    }
}
