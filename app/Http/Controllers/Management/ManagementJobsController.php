<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementJobsController extends Controller
{
    public function index()
    {
        return view('admin.jobs.jobs');
    }

    public function appliedJobs()
    {
        return view('admin.jobs.applied-jobs');
    }

    public function trashedJobs()
    {
        return view('admin.jobs.trash-jobs');
    }

    public function pendingApproval()
    {
        return view('admin.jobs.pending');
    }

    public function add()
    {
        return view('admin.admin-add-new-job');
    }

    public function store(Request $request)
    {

    }

}
