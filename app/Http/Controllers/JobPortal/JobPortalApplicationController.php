<?php

namespace App\Http\Controllers\JobPortal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobPosting\JobPosting;

class JobPortalApplicationController extends Controller
{
    public function resumeForm($id)
    {
        $job = JobPosting::find($id);
        return view('Sys.JobPortalApplication.ResumeForm', compact('job'));
    }
}
