<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthRedirect
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && ($request->is('login') || $request->is('register'))) {
            // Redirect user based on role
            return match (Auth::user()->role) {
                'Admin' => redirect('/admin-dashboard'),
                'Employer' => redirect('/employer-dashboard'),
                'Candidate' => redirect('/candidate-dashboard'),
                default => redirect('/'), // Default redirect for other roles
            };
        }

        return $next($request);
    }
}

