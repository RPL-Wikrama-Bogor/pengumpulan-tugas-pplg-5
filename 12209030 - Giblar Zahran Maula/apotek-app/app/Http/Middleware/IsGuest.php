<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGuest
{ public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            return redirect('/dashboard')->with('failed', 'Anda sudah login.');
            // Jika sudah login, redirect ke halaman dashboard
        }
        
        // Jika belum login, lanjutkan ke rute berikutnya
        return $next($request);
    }
}
