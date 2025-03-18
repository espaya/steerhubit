<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'Candidate') {
            return $next($request)->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        }

        return redirect()->route('welcome');
    }
}


