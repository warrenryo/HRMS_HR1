<?php

namespace App\Http\Controllers\ApplicantTracking;

use Carbon\Carbon;
use App\Mail\JobOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\JobPosting\JobPosting;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Interviews\FinalInterviewCandidate;
use App\Models\Interviews\IsForJobOffer;
use App\Models\Interviews\EvaluateFinalIntervieww;

class FinalInterviewsController extends Controller
{
    public function GetAllFinalInterviews()
    {
        $applicants = FinalInterviewCandidate::with('applicantInitial')->where('isForJobOffer', false)->where('finalInterviewDone', false)->orderBy('id', 'DESC')->get();    
        return view('Admin.ATS.FinalInterviews.FinalIndex', compact('applicants'));
    }

    public function GetAllTodaysFinalInterviews()
    {
        $applicants = FinalInterviewCandidate::with('applicantInitial')
        ->where('isForJobOffer', false)
        ->where('finalInterviewDone', false)
        ->where('isDone', false)
        ->whereDate('date', Carbon::today()) // Filter by today's date
        ->orderBy('time', 'ASC') // Sort by time in ascending order
        ->orderBy('id', 'DESC') // Optional: you can still order by ID if needed
        ->get();
        return view('Admin.ATS.FinalInterviews.TodaysFinalInterview', compact('applicants'));
    }

    
    public function GetDoneInterviews()
    {
        $all_applicants = FinalInterviewCandidate::with('applicantInitial')
        ->where('isForJobOffer', false)
        ->where('finalInterviewDone', false)
        ->where('isDone', true)
        ->orderBy('id', 'DESC') // Optional: you can still order by ID if needed
        ->get();
        $applicants = $all_applicants->map(function ($applicant) {
            // Calculate the sum of ratings for each applicant
            $sum_ratings = EvaluateFinalIntervieww::where('applicant_id', $applicant->applicant_id)
                ->sum('ratings');
    
            // Check if the applicant passed
            $is_passed = $sum_ratings > 25;
    
            // Add the pass status to the applicant
            $applicant->is_passed = $is_passed;
    
            return $applicant;
        });
        return view('Admin.ATS.FinalInterviews.DoneFinalInterview', compact('applicants'));
    }

    public function MarkAsDone($id, Request $request)
    {
        $interviewCandidate = FinalInterviewCandidate::find($id);

        if($interviewCandidate)
        {
            foreach ($request->criteria as $index => $criteria) {
                EvaluateFinalIntervieww::create([
                    'applicant_id' => $id,
                    'criteria' => $criteria,
                    'ratings' => $request->ratings[$index],
                    'comments' => $request->comments[$index],
                ]);
            }
            $interviewCandidate->update([
                'isDone' => true
            ]);

            Alert::success('Success', 'This candidate interview is mark as done');
            return redirect()->back();
        }
    }

    public function MarkAsPassed($id)
    {
        $interviewCandidate = FinalInterviewCandidate::find($id);

        if($interviewCandidate)
        {
            $interviewCandidate->update([
                'isForJobOffer' => true,
            ]);

            Alert::success('Success', 'This candidate interview is mark as done');
            return redirect()->back();
        }
    }

    public function ScheduleJobOffer(Request $request, $applicant_id)
    {
        $candidate = FinalInterviewCandidate::with('applicantInitial')->where('applicant_id', $applicant_id)->first();
        $job = JobPosting::where('id', $candidate->applicantInitial->job_id)->first();
        $initial = new IsForJobOffer();

        if($initial)
        {
            $candidate->update([
                'finalInterviewDone' => true
            ]);

            $initial->create([
                'date' => $request->date,
                'time' => $request->time,
                'applicant_id' => $applicant_id
            ]);

            $isFinal = true;
            Mail::to($candidate->applicantInitial->email)
            ->cc('paradise.hotel@gmail.com')
            ->bcc('hr.hotel@gmail.com')
            ->send(new JobOffer($request->date, 
            $request->time, 
            $request->first_name, 
            $request->last_name, 
            $job->title
            ));
            Alert::success('Applicant has been added to Final Interview', 'The Interview Email has been send to '.$candidate->applicantInitial->email.'');
            return redirect()->back();
        }
    }
    

}
