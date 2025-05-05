<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\ApplicantShortlist;
use Illuminate\Http\Request;

class EmployerCandidateShortlistController extends Controller
{
    public function index(Request $request)
    {
        $query = ApplicantShortlist::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;

            $query->whereHas('user.profile', function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $shortlists = $query->paginate(10)->appends($request->query());
        $totalShortlist = $query->count();

        return view('employer.employer-candidate-shortlist', compact('shortlists', 'totalShortlist'));
    }

}
