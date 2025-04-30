<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\CandidateProfile;
use App\Models\Resume;
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
        $userId = Auth::user()->id;

        $request->validate([
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Your password is incorrect.');
                    }
                }
            ],
        ], [
            'password.required' => 'This field is required',
        ]);

        DB::beginTransaction();

        try 
        {
            $user = User::find($userId);

            if (!$user) 
            {
                return redirect()->back()->with(['error' => 'Your account was not found']);
            }

            // Delete related data
            $applyForJob = ApplyForJob::where('applicant_id', $userId)->first();
            $candidateProfile = CandidateProfile::where('userID', $userId)->first();
            $resume = Resume::where('userID', $userId)->first();

            if($applyForJob)
            {
                $applyForJob->forceDelete();
            }

            if($candidateProfile)
            {
                $candidateProfile->delete();
            }

            if($resume)
            {
                $resume->delete();
            }

            // Permanently delete user
            $user->forceDelete();

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
