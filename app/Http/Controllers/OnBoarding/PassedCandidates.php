<?php

namespace App\Http\Controllers\OnBoarding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interviews\FinalInterviewCandidate;

class PassedCandidates extends Controller
{
    public function GetAllPassedCandidates()
    {
        $applicants = FinalInterviewCandidate::with('applicantInitial')->where('isForJobOffer', true)->where('finalInterviewDone', false)->orderBy('id', 'DESC')->get();    
        return view('Admin.OnBoarding.PassedCandidates.PassedCandidatesIndex', compact('applicants'));
    }
}
