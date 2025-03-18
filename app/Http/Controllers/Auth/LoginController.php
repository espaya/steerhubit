<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return redirect()->route('welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->to('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ], [
            'email.required' => 'This field is required',
            'email.email' => 'Invalid input',

            'password.required' => 'This field is required',
            'password.string' => 'Invalid input',
            'password.min' => 'Input is too short'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->remember == 1; // Convert to boolean

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Get the current date and time
            $timeZone = $request->timezone;
            $loginDateTime = now()->setTimezone($timeZone)->format('F j, Y | g:iA (T)');

            // Get user agent details
            $agent = new Agent();
            $browser = $agent->browser();
            $platform = $agent->platform();
            $device = $agent->isMobile() ? 'Mobile' : 'Desktop';

            // Get user location using ip

            // send welcome email whenever user sign in
            Mail::to($user->email)->send(new LoginEmail($user, $loginDateTime, $browser, $platform, $device));

            // Handle redirection based on role
            $redirectUrl = match (strtolower(Auth::user()->role)) {
                'employer' => '/employer-dashboard',
                'candidate' => '/candidate-dashboard',
                'admin' => '/admin-dashboard',
                default => '/',
            };            

            return response()->json([
                'success' => true,
                'redirect' => $redirectUrl
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Your account was not found!'
        ], 401);
    }

}
