<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Mail\ShortlistEmail;
use App\Models\ApplicantShortlist;
use App\Models\ApplyForJob;
use App\Models\CandidateProfile;
use App\Models\EmployerProfile;
use App\Models\Job;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $job = Job::where('slug', $slug)->first();

        return view('employer.employer-candidate-details', [
            'profile' => $profile, 
            'slug' => $slug,
            'job' => $job
        ]);
    }

    public function shortlistCandidate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'applicant_id' => ['required', 'integer'],
            'slug' => ['required', 'string'],
        ], [
            'applicant_id.required' => 'Applicant id is missing',
            'applicant_id.integer' => 'Applicant id is not in the right format',
            'slug.required' => 'Job url is required',
            'slug.string' => 'Job url is not in the right format'
        ]);

        $applicant_id = htmlspecialchars(trim($request->applicant_id), ENT_QUOTES, 'utf-8');
        $slug = htmlspecialchars(trim($request->slug), ENT_QUOTES, 'utf-8');

        try 
        {
            DB::beginTransaction();

            $shortlisted = ApplicantShortlist::where('applicant_id', $applicant_id)
                ->where('slug', $slug)
                ->first();

            if($shortlisted)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'This applicant is already shortlisted for this job'
                ], 409);
            }

            ApplicantShortlist::create([
                'applicant_id' => $applicant_id,
                'employer_id' => $user->id,
                'slug' => $slug,
                'shortlisted' => true
            ]);

            // send email to candidate
            $applicant = CandidateProfile::where('userID', $applicant_id)->first();
            Mail::to($applicant->user->email)->send(new ShortlistEmail($applicant));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'This applicant shortlisted successfully',
            ], 200);

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
