<?php

namespace App\Http\Controllers;

use App\Models\ApplyForJob;
use App\Models\EmployerProfile;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobDetailsController extends Controller
{
    public function index()
    {
        // Fetch all jobs, ordered by ID in descending order, with pagination
        $jobs = Job::orderBy('id', 'DESC')->paginate(10);

        // Fetch all job IDs for the currently authenticated user
        $appliedJobs = ApplyForJob::where('applicant_id', Auth::user()->id)
            ->whereIn('job_id', $jobs->pluck('id')->toArray()) 
            ->get()
            ->pluck('job_id'); 

        // Get employer avatars along with their user IDs
        $employer_avatar = User::whereIn('id', $jobs->pluck('userID')->toArray())->get(['id', 'avatar']); 

        // Pass jobs and applied job IDs to the view
        return view('job', [
            'jobs' => $jobs,
            'appliedJobs' => $appliedJobs,
            'employer_avatar' => $employer_avatar
        ]);
    }


    public function show($slug)
    {
        $job = Job::where('slug', $slug)->first();

        if(!$job)
        {
            return view('errors.404');
        }

        $relatedJob = Job::where('userID', $job->userID)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $employer_website = EmployerProfile::where('userID', $job->userID)->value('employer_website');

        // Get the employer avatar for a single job
        $employer_avatar = User::where('id', $job->userID)->first('avatar');

        return view('job-details', [
            'job' => $job, 
            'employer_website' => $employer_website,
            'relatedJob' => $relatedJob,
            'employer_avatar' => $employer_avatar
        ]);
    }

    public function apply($id)
    {
        $user = Auth::user(); 

        try 
        {
            DB::beginTransaction();

            // Check if applicant is same as employer
            $isEmployer = User::where('id', $user->id)->where('role', 'EMPLOYER')->value('id');

            if($isEmployer)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot apply to this job',
                ], 403); // Forbidden
            }

            // Check if employee has already applied
            $isApplied = ApplyForJob::where('applicant_id', $user->id)
                ->where('job_id', $id)
                ->first();
            
            if($isApplied)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already applied to this job'
                ], 409); // Conflict
            }

            // Check if applicant is steerhubit management
            if($user->role == 'admin')
            {
                return response()->json([
                    'success' => false, 
                    'message' => 'You cannot apply to this job'
                ], 403);
            }

            // Check deadline
            $job_dealine = Job::where('id', $id)->value('deadline');

            if(Carbon::parse($job_dealine)->isPast())
            {
                return response()->json([
                    'success' => false,
                    'Application deadline has past'
                ], 403);
            }


            $apply = new ApplyForJob();

            $apply->job_id = $id;
            $apply->applicant_id = Auth::user()->id;
            $apply->userID = Job::where('id', $id)->value('userID');

            $apply->save();

            // increase applicants column in jobs
            $job = Job::find($id);
            $job->applicants++; 
            $job->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'You have successfully applied for this job'
            ], 200); // OK
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Error applying for job: ' . $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred while applying for this job. Please try again later.'
            ], 500); // Internal Server Error
        }
    }

}
