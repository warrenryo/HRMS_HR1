<?php

namespace App\Http\Controllers\ApplicantTracking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\JobPostingApplicant\Applicants;
use App\Models\JobPostingCandidate\Candidates;

class ApplicantsController extends Controller
{
    public function index()
    {
        $applicants = Applicants::with('jobApplied')->where('isCandidate', false)->get();

        return view('Admin.ATS.ApplicantsIndex', compact('applicants'));
    }

    public function addCandidate($applicant_id)
    {
        $applicant = Applicants::find($applicant_id);

        if($applicant)
        {
            Candidates::create([
                'applicant_id' => $applicant->id,
            ]);

            $applicant->update([
                'isCandidate' => true
            ]);

            Alert::success('Success', 'This applicant has been added to Candidates');
            return redirect()->back()->with('success','Added to Candidate successfully');
        }else{
            Alert::error('something went wrong');
            return redirect()->back();
        }
    }

    public function GetAllCandidates()
    {
        $applicants = Candidates::with('jobApplicantCandidate')->where('isForInteview', false)->get();

        return view('Admin.ATS.AllCandidates',compact('applicants'));
    }
}
