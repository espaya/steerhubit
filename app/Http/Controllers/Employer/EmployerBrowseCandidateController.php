<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\CandidateProfile;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerBrowseCandidateController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search query

        // Get distinct applicant IDs
        $candidates_ids = ApplyForJob::distinct('applicant_id')->pluck('applicant_id');

        // Build query
        $query = CandidateProfile::whereIn('userID', $candidates_ids);

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

        return view('employer.employer-candidate-list', compact('candidates'));
    }
   

    public function view()
    {
        return view('employer.employer-candidate-details');
    }

}
