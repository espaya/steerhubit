<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateDashboardController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $total_applied_jobs = ApplyForJob::where('applicant_id', $id)->limit(10)->count();

        return view('employee.employee', [
            'total_applied_jobs' => $total_applied_jobs
        ]);
    }
}
