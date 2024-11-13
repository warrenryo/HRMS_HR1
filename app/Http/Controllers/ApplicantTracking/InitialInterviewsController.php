<?php

namespace App\Http\Controllers\ApplicantTracking;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interviews\InitialInterviewCandidate;

class InitialInterviewsController extends Controller
{
    public function GetAllInitialInterviews()
    {
        $applicants = InitialInterviewCandidate::with('applicantInitial')->where('isForFinalInterview', false)->orderBy('id', 'DESC')->get();    
        return view('Admin.ATS.InitialInterviews.InitialIndex', compact('applicants'));
    }


    public function GetTodaysInterview()
    {   
        $applicants = InitialInterviewCandidate::with('applicantInitial')
        ->where('isForFinalInterview', false)
        ->whereDate('date', Carbon::today()) // Filter by today's date
        ->orderBy('time', 'ASC') // Sort by time in ascending order
        ->orderBy('id', 'DESC') // Optional: you can still order by ID if needed
        ->get();
        return view('Admin.ATS.InitialInterviews.TodaysInterview', compact('applicants'));
    }
}
