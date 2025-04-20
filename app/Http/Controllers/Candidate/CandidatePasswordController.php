<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CandidatePasswordController extends Controller
{
    public function index()
    {
        return view('employee.employee-change-password');
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        
        $user = User::find($id);

        if(!$user)
        {
            return redirect()->back()->with(['error' => 'User was not found']);
        }

        $request->validate([
            'currentPassword' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The current password is incorrect.');
                    }
                }
            ],
            'newPassword' => [
                'required',
                'string',
                'min:12',  // Increased minimum length
                'different:currentPassword',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/',
                'not_regex:/(.)\1{3,}/' // Prevent 4+ repeating characters
            ],
            'retypePassword' => [
                'required',
                'string',
                'same:newPassword'
            ]
        ], [
            'currentPassword.required' => 'Current password is required',
            'newPassword.required' => 'New password is required',
            'newPassword.min' => 'Password must be at least 12 characters',
            'newPassword.different' => 'New password must be different from current password',
            'newPassword.regex' => 'Password must contain at least one uppercase, one lowercase, one number and one special character',
            'newPassword.not_regex' => 'Password contains too many repeating characters',
            'retypePassword.required' => 'Password confirmation is required',
            'retypePassword.same' => 'Passwords do not match'
        ]);

        
        try 
        {
            DB::beginTransaction();

           

            // check if password matchs
            if(!Hash::check($request->currentPassword, $user->password)) 
            {
                return redirect()->back()->with(['error' => 'Incorrect current password']);
            }
            
            $user->password = Hash::make($request->newPassword);
            $user->save();

            DB::commit();

            // Send email notification
            return redirect()->back()->with(['success' => 'Password updated successfully']);
           
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst saving password: ' . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst saving password']);
        }

    }
}
