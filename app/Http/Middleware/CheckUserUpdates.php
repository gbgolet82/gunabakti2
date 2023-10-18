<?php

namespace App\Http\Middleware;

use App\Models\Karyawan;
use App\Models\Usaha;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserUpdates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Periksa perubahan data akun di database
        $karyawan = Karyawan::where('nohp', session('nohp'))->first();

        if ($karyawan) {
            // Update session data
            session(['nama' => $karyawan->nama]);
            // Update sesi peran jika perlu

            session()->save();
        }

        return $next($request);
    }
}
