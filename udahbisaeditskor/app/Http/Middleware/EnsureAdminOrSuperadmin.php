<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdminOrSuperadmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna terotentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Periksa apakah pengguna adalah superadmin (isSuperadmin true) atau admin (isSuperadmin false)
            if ($user->isSuperadmin === true || $user->isSuperadmin === false) {
                return $next($request);
            }
        }

        // Jika bukan admin atau superadmin, arahkan kembali atau tampilkan pesan
        return redirect()->route('auth-login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
