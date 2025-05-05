<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\ApplicantShortlist;
use Illuminate\Http\Request;

class CandidateJobShortlistedController extends Controller
{
    public function index(Request $request)
    {
        $query = ApplicantShortlist::query();

        if ($request->has('search') && $request->search !== null) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%'); // adjust column as needed
        }

        $shortlisted = $query->paginate(10)->withQueryString(); // preserve search in pagination links

        return view('employee.employee-job-shortlisted', compact('shortlisted'));
    }

}
