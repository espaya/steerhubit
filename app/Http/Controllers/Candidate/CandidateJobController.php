<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateJobController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $applied = ApplyForJob::where('applicant_id', $user->id)->get();
        $search = htmlspecialchars(trim($request->search), ENT_QUOTES, 'utf-8');

        $jobQuery = Job::whereIn('id', $applied->pluck('job_id'));

        if ($search) {
            $jobQuery->where(function ($query) use ($search) {
                $query->where('status', 'APPROVED')->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('pay', 'LIKE', "%{$search}%")
                    ->orWhere('country', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('qualification', 'LIKE', "%{$search}%")
                    ->orWhere('working_day', 'LIKE', "%{$search}%")
                    ->orWhere('working_schedule', 'LIKE', "%{$search}%");
            });
        }

        $jobs = $jobQuery->where('status', 'APPROVED')->paginate(10)->withQueryString(); // keep search query on pagination

        return view('employee.employee-applied-job', ['jobs' => $jobs]);
    }

}
