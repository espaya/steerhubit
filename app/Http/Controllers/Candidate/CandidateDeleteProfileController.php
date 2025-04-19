<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\CandidateProfile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CandidateDeleteProfileController extends Controller
{
    public function index()
    {
        return view('employee.employee-delete-profile');
    }


    public function destroy(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'password' => ['required']
        ], [
            'password.required' => 'This field is required'
        ]);

        $password = $request->password;

        if (!Hash::check($password, Auth::user()->password)) 
        {
            return redirect()->back()->with(['error' => 'Your password is incorrect']);
        }

        DB::beginTransaction();

        try 
        {
            $user = User::find($userId);

            if (!$user) 
            {
                return redirect()->back()->with(['error' => 'Your account was not found']);
            }

            // Delete related data
            $applyForJob = ApplyForJob::where('userID', $userId)->first();
            if($applyForJob) $applyForJob->delete();
            $candidateProfile = CandidateProfile::where('userID', $userId)->first();
            if($candidateProfile) $candidateProfile->delete();

            // Delete user
            $user->delete();

            DB::commit();
            Auth::logout(); // Log out the user after deletion

            return redirect('/')->with(['success' => 'Your account has been successfully deleted.']);
        } 
        catch (\Exception $ex) 
        {
            DB::rollBack();
            Log::error('Error deleting account: ' . $ex->getMessage());

            return back()->with(['error' => 'An unexpected error occurred while deleting your account.']);
        }
    }

}
