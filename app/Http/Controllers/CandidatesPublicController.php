<?php

namespace App\Http\Controllers;

use App\Models\CandidateProfile;
use App\Models\Job;
use App\Models\ProfileView;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


        // increment profile view count for user
        $view = ProfileView::where('applicant_id', $id)->first();

        try {
            DB::beginTransaction();

            if ($view) {
                $view->views++;
                $view->save();
            } else {
                $addView = new ProfileView();
                $addView->views = 1; // Set initial value
                $addView->applicant_id = $id;
                $addView->save();
            }

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack(); // Important: Rollback on error
            Log::error('An error occurred whilst adding view: ' . $ex->getMessage());
        }

        return view('public.candidate-public-profile', [
            'profile' => $profile,
            'relatedProfiles' => $relatedProfiles
        ]);
    }
}
