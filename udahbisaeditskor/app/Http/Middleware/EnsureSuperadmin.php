<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSuperadmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna terotentikasi dan merupakan superadmin
        if (Auth::check() && Auth::user()->isSuperadmin) {
            return $next($request);
        }

        // Jika bukan superadmin, arahkan kembali atau tampilkan pesan
        return redirect()->route('auth-login')->with('error', 'Anda tidak memiliki akses ke halaman ini. Silahkan Login terlebih dahulu.');
    }
}
