<?php

namespace App\Http\Controllers;

use App\Models\CandidateProfile;
use App\Models\Job;
use Illuminate\Http\Request;

class CandidatesPublicController extends Controller
{
    public function show($id)
    {
        $profile = CandidateProfile::with('resume')->where('userID', $id)->firstOrFail();

        $skills = [];
        if ($profile->resume && $profile->resume->skills) {
            $skills = array_map('trim', explode(',', $profile->resume->skills));
        }

        // Fetch related profiles
        $relatedProfiles = CandidateProfile::with('resume')
            ->where('userID', '!=', $id)
            ->get()
            ->filter(function ($p) use ($skills) {
                if (!$p->resume || !$p->resume->skills) return false;
                $pSkills = array_map('trim', explode(',', $p->resume->skills));
                return count(array_intersect($skills, $pSkills)) > 0;
            })
            ->take(5); // Limit to 5 results

        return view('public.candidate-public-profile', [
            'profile' => $profile,
            'relatedProfiles' => $relatedProfiles
        ]);
    }


}
