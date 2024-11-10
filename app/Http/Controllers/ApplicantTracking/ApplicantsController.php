<?php

namespace App\Http\Controllers\ApplicantTracking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobPostingApplicant\Applicants;

class ApplicantsController extends Controller
{
    public function index()
    {
        $applicants = Applicants::all();

        return view('Admin.ATS.ApplicantsIndex', compact('applicants'));
    }
}
