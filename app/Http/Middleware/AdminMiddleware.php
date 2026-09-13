<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::get('login') || Session::get('role') !== 'admin') {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin terlebih dahulu.');
        }

        return $next($request);
    }
}

