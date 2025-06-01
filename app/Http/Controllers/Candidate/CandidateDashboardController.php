<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\ApplicantShortlist;
use App\Models\ApplyForJob;
use App\Models\ProfileView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateDashboardController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $total_applied_jobs = ApplyForJob::where('applicant_id', $id)->count();

        $shortlisted_job = ApplicantShortlist::where('applicant_id', $id)->count();

        $views = ProfileView::where('applicant_id', $id)->value("views");

        return view('employee.employee', [
            'total_applied_jobs' => $total_applied_jobs,
            'shortlisted_job' => $shortlisted_job,
            'views' => $views
        ]);
    }
}
