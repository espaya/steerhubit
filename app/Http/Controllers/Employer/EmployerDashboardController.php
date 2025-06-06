<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $jobsPosted = Job::where('userID', $id)->count();
        $applications = Job::where('userID', $id)->pluck('applicants')->count();

        $jobViews = JobViews::where('userID', $id)->sum('views');
        

         return view('employer.employer', [
            'jobsPosted' => $jobsPosted,
            'applications' => $applications,
            'jobViews' => $jobViews
         ]);
    }
}
