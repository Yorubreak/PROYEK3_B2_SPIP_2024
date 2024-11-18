<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Default locale jika tidak ada di session
        $defaultLocale = 'en'; // Ganti dengan locale default yang diinginkan

        // Periksa apakah ada locale di session dan apakah sesuai dengan daftar yang diizinkan
        $locale = session()->get('locale', $defaultLocale); // Gunakan default jika tidak ada di session
        if (in_array($locale, ['en', 'fr', 'ar', 'de'])) {
            app()->setLocale($locale);
        } else {
            // Set ke default jika tidak sesuai
            app()->setLocale($defaultLocale);
        }

        return $next($request);
    }
}
