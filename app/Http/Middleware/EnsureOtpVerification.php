<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access if either the session OTP or the database OTP is present
        if (!session('otp') && !Auth::user()->otp) 
        {
            return redirect('/')->with('error', 'You must start the OTP verification process.');
        }

        return $next($request);
    }
}