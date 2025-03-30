<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginEmail;
use App\Mail\OtpMail;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use PragmaRX\Google2FA\Google2FA;
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
        // set otp verification to false
        $user = Auth::user();
        $user->is_otp_verified = false;
        $user->save();

        Auth::logout();

        if ($request->hasSession()) 
        {
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

        try 
        {
            $credentials = $request->only('email', 'password');
            $remember = $request->remember == 1; // Convert to boolean

            if (Auth::attempt($credentials, $remember)) 
            {
                $user = Auth::user();

                // Generate an OTP
                $google2fa = new Google2FA();
                $secretKey = $google2fa->generateSecretKey();
                $otp = $google2fa->getCurrentOtp($secretKey);

                // Store OTP in session
                session(['otp' => $otp]);
                session()->save();

                // Store OTP in the database
                $user->otp = $otp;

                $user->save();

                // Send OTP to user's email
                Mail::to($user->email)->send(new OtpMail($user, $otp));

                // Redirect to OTP verification page
                return response()->json([
                    'success' => true,
                    // 'redirect' => route('verify-otp') // Redirect to OTP verification page
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Your account was not found!'
            ], 401);
        }
        catch(Exception $ex)
        {
            Log::error('Authentication Error: ' . $ex);
            return response()->json([
                'success' => false,
                'message' => 'Authentication Error'
            ], 500);
        }
    }

}
