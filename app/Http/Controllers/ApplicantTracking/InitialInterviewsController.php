<?php

namespace App\Http\Controllers\ApplicantTracking;

use Carbon\Carbon;
use App\Mail\HRMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\JobPosting\JobPosting;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\AIModels\AIPredictionResponse;
use App\Models\Interviews\FinalInterviewCandidate;
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
        ->where('isDone', false)
        ->whereDate('date', Carbon::today()) // Filter by today's date
        ->orderBy('time', 'ASC') // Sort by time in ascending order
        ->orderBy('id', 'DESC') // Optional: you can still order by ID if needed
        ->get();
        return view('Admin.ATS.InitialInterviews.TodaysInterview', compact('applicants'));
    }

    public function MarkAsDone($id)
    {
        $interviewCandidate = InitialInterviewCandidate::find($id);

        if($interviewCandidate)
        {
            $interviewCandidate->update([
                'isDone' => true
            ]);

            Alert::success('Success', 'This candidate interview is mark as done');
            return redirect()->back();
        }
    }

    public function GetDoneInterviews()
    {
        $applicants = InitialInterviewCandidate::with('applicantInitial')
        ->where('isForFinalInterview', false)
        ->where('isDone', true)
        ->orderBy('id', 'DESC') // Optional: you can still order by ID if needed
        ->get();
        return view('Admin.ATS.InitialInterviews.DoneInitialInterview', compact('applicants'));
    }

    public function ScheduleFinalInterview(Request $request, $applicant_id)
    {
        $candidate = InitialInterviewCandidate::with('applicantInitial')->where('applicant_id', $applicant_id)->first();
        $job = JobPosting::where('id', $candidate->applicantInitial->job_id)->first();
        $initial = new FinalInterviewCandidate();

        if($initial)
        {
            $candidate->update([
                'isForFinalInterview' => true,
            ]);

            $initial->create([
                'date' => $request->date,
                'time' => $request->time,
                'via' => $request->via,
                'link' => $request->link,
                'applicant_id' => $applicant_id
            ]);

            $isFinal = true;
            Mail::to($candidate->applicantInitial->email)
            ->cc('paradise.hotel@gmail.com')
            ->bcc('hr.hotel@gmail.com')
            ->send(new HRMailer($candidate, 
            $request->date, 
            $request->time, 
            $request->via, 
            $request->link,
                $candidate->applicantInitial->first_name, $candidate->applicantInitial->last_name,
                $job->title,$isFinal
            ));
            Alert::success('Applicant has been added to Final Interview', 'The Interview Email has been send to '.$candidate->applicantInitial->email.'');
            return redirect()->back();
        }
    }
}
