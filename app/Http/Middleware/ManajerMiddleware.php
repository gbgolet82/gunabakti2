<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManajerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    // public function handle($request, Closure $next)
    // {
    //     if (auth()->check() && auth()->user()->karyawan->manajer === 1) {
    //         return $next($request);
    //     }
        
    //     return redirect('unauthorized'); // Redirect ke halaman tidak diizinkan jika bukan manajer
    // }
    

}
