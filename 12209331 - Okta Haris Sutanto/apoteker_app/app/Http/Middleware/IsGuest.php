<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            // dibolehkan untuk akses ke remote terkait
            return $next($request);
        }else{
            // kalau belum ada data loin dibatalkan ke halam route nama login dengan session failed
            return redirect()->route('index')->with('sudah', 'Anda Sudah Login');
        }
    }
}
