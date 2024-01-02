<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsPembimbing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if(Auth::check() && Auth::user()->role == 'ps') {
        return $next($request);
    } else {
        return redirect('/dashboard-pemb')->with("failed", "Anda bukan pembimbing!");
    }
}

}
