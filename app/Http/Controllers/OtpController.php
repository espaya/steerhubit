<?php

namespace App\Http\Controllers;

use App\Mail\LoginEmail;
use App\Mail\OtpMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use PragmaRX\Google2FA\Google2FA;

class OtpController extends Controller
{
    public function showOtpVerificationForm()
    {
        return view('auth.verify-otp');
    }

    public function newOtpCode()
    {
        $user = Auth::user();

        if (!$user) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

        try 
        {
            $google2fa = new Google2FA();
            $secretKey = $google2fa->generateSecretKey();
            $otp = $google2fa->getCurrentOtp($secretKey);

            session(['otp' => $otp]);
            session()->save();

            $user->otp = $otp;
            $user->save();

            $email = $user->email;
            
            $maskedEmail = preg_replace('/(?<=.{2}).(?=.*@)/', '*', $email);

            Mail::to($user->email)->send(new OtpMail($user, $otp));

            return response()->json([
                'success' => true,
                'message' => 'New OTP has been sent to your email ' . $maskedEmail
            ], 200);

        } 
        catch(Exception $ex) 
        {
            Log::error('Error generating new otp: '. $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error from the server'
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string'],
            'timezone' => ['required', 'string', 'timezone']
        ], [
            'otp.required' => 'Please enter the code sent to your email',
            'otp.string' => 'Code is not in the correct format',
            'timezone.required' => 'Timezone is not set',
            'timezone.string' => 'Timezone is not in the correct format',
            'timezone.timezone' => 'Incorrect timezone'
        ]);

        try {
            $user = Auth::user();

            if ($user && $request->otp == $user->otp) 
            {
                session()->forget('otp');

                $user->otp = '';
                $user->is_otp_verified = true;
                $user->save();

                $timeZone = $request->timezone;
                $loginDateTime = now()->setTimezone($timeZone)->format('F j, Y | g:iA (T)');

                $agent = new Agent();
                $browser = $agent->browser();
                $platform = $agent->platform();
                $device = $agent->isMobile() ? 'Mobile' : 'Desktop';

                Mail::to($user->email)->send(new LoginEmail($user, $loginDateTime, $browser, $platform, $device));

                $redirectUrl = match (strtolower($user->role)) {
                    'employer' => '/employer-dashboard',
                    'candidate' => '/candidate-dashboard',
                    'admin' => '/0246520325/management',
                    default => '/',
                };

                return response()->json([
                    'success' => true,
                    'message' => 'OTP verified successfully!',
                    'redirect' => $redirectUrl
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP. Please try again.'
            ], 422);
        } 
        catch (Exception $ex) 
        {
            Log::error('Error verifying OTP code: ' . $ex);

            return response()->json([
                'success' => false,
                'message' => 'Error verifying OTP code.'
            ], 500);
        }
    }

}
