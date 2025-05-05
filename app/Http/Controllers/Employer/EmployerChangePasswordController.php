<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployerChangePasswordController extends Controller
{
    public function index()
    {
        return view('employer.employer-change-password');
    }

    public function update(Request $request)
    {
        $id = Auth::id();

        $request->validate([
            'newPassword' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/',
                function ($attribute, $value, $fail) {
                    if (Hash::check($value, Auth::user()->password)) {
                        $fail('Your new password cannot be the same as your current password.');
                    }
                },
            ],
            'retypePassword' => ['same:newPassword'],
            'currentPassword' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Your current password is incorrect.');
                    }
                },
            ]
        ], [
            'currentPassword.required' => 'Your current password is required',
            'newPassword.required' => 'New password is required',
            'newPassword.regex' => 'Password must be at least 8 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'retypePassword.same' => 'Passwords do not match'
        ]); 

        try 
        {
            DB::beginTransaction();

            $user = User::find($id);
            if(!$user)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Your account was not found'
                ], 404);
            }

            $newPassword = Hash::make($request->newPassword);
            $user->password = $newPassword;
            $user->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Your password updated successfully'
            ], 200);
        }
        catch(Exception $ex)
        {
            DB::rollBack();

            Log::error('An error occurred whilst changing your password: ' . $ex->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred whilst changing your password'
            ], 500);
        }
    }
}
