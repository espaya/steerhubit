<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateResumeController extends Controller
{
    public function index()
    {
        return view('employee.employee-resume');
    }
}
