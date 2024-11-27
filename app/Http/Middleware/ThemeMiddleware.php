<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $theme = $request->cookie('theme', 'day-theme'); // Default to day-theme
        // $theme = $encryptedValue ? Crypt::decrypt($encryptedValue) : 'day-theme';
        view()->share('theme', $theme); // Share with views

        return $next($request);
    }
}
