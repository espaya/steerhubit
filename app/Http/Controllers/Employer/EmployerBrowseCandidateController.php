<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\CandidateProfile;
use App\Models\EmployerProfile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployerBrowseCandidateController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search query

        // Get distinct applicant IDs
        $candidates_ids = ApplyForJob::distinct('applicant_id')->pluck('applicant_id');

        // Build query
        $query = CandidateProfile::with('user')->whereIn('userID', $candidates_ids);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('fullName', 'like', "%$search%")
                ->orWhere('country', 'like', "%$search%")
                ->orWhere('state', 'like', "%$search%")
                ->orWhere('present_address', 'like', "%$search%")
                ->orWhere('postal_code', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
            });
        }

        $candidates = $query->paginate(10)->appends(['search' => $search]);

        $totalApplicants = ApplyForJob::where('userID', Auth::id())->count(); 

        return view('employer.employer-candidate-list', compact('candidates', 'totalApplicants'));
    }
   

    public function view($slug, $id)
    {
        $profile = CandidateProfile::where('userID', $id)->first();

        return view('employer.employer-candidate-details', ['profile' => $profile]);
    }

    public function shortlistCandidate()
    {
        try 
        {
            DB::beginTransaction();

            

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst shortlisting this candidate: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst shortlisting this candidate'
            ], 500);
        }
    }

}
