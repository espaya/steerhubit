<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\ApplicantShortlist;
use App\Models\EmployerProfile;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManagementEmployersController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Default to 10 if not set
        $search = trim($request->query('search', ''));

        $query = User::where('role', 'EMPLOYER')->orderBy('id', 'DESC'); 

        if (!empty($search)) 
        {
            $query->where(function ($q) use ($search) 
            {
                $q->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        $employers = $query->paginate($perPage);
        $totalEmployers = User::where('role', 'EMPLOYER')->count();

        $limits = [];

        for ($i = 10; $i <= $totalEmployers; $i *= 2) 
        {
            $limits[] = $i;
        }

        // Ensure the last option is the total number of employers
        if ($totalEmployers > end($limits)) 
        {
            $limits[] = $totalEmployers;
        }

        return view('admin.employers', compact('employers', 'totalEmployers', 'limits'));
    
    }

    public function show($username)
    {
        $user = User::where('name', $username)->first();

        if($user)
        {
            $employer = EmployerProfile::where('userID', $user->id)->first();
            $jobs = Job::where('userID', $user->id)->limit(5)->get();
            $shortlists = ApplicantShortlist::where('employer_id', $user->id)->first();

            $countJobs = Job::where('userID', $user->id)->count();
            $countApplicants = Job::where('userID', $user->id)->value('applicants');
            $countShortlists = ApplicantShortlist::where('employer_id', $user->id)->count();

            return view('admin.employer.admin-view-employer', [
                'employer' => $employer,
                'user' => $user,
                'jobs' => $jobs,
                'shortlists' => $shortlists,
                'countJobs' => $countJobs,
                'countApplicants' => $countApplicants,
                'countShortlists' => $countShortlists
            ]);
        }
        
        return redirect()->back()->with(['error' => 'User not found']);
        
    }
}
