<?php

namespace App\Http\Controllers\JobPortal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobPosting\JobPosting;

class JobPortalController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::where('isActive', true)->get();
        return view("Sys.JobPortal.JobPortal", compact('jobs'));
    }

    public function getJobs($id)
    {
        $job = JobPosting::with(['jobQualifications', 'jobResponsibilities', 'jobSkills', 'jobSetup'])
                         ->findOrFail($id);

        // Return the job details as JSON
        return response()->json([
            'title' => $job->title,
            'employment_type' => $job->employment_type,
            'location' => $job->location,
            'role_description' => $job->role_description,
            'benefits' =>  $job->benefits,
            'schedule' =>  $job->schedule,
            'setup' =>  $job->setup,
            'salary_from' => $job->salary_from,
            'salary_to' => $job->salary_to,
            'status' => $job->status,
            'isActive' => $job->isActive,
            'close_date' => $job->close_date,
            'created_at' => $job->created_at,   
            'description' => $job->role_description, // Assuming you want to show the role description
            'qualifications' => $job->jobQualifications, // Qualifications
            'responsibilities' => $job->jobResponsibilities, // Responsibilities
            'skills' => $job->jobSkills, // Skills
            'job_setup' => $job->jobSetup, // Employment Setup
        ]);
    }
}
