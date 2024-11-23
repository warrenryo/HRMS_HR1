<?php

namespace App\Http\Controllers\OnBoarding;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interviews\IsForJobOffer;
use RealRashid\SweetAlert\Facades\Alert;

class JobOffersController extends Controller
{
    public function GetAllJobOffers()
    {
        $applicants = IsForJobOffer::with('applicantFinal')
            ->where('isDone', false)
            ->where('isOnBoarding', false)
            ->where('isRejected', false)
            ->get();

        return view('Admin.OnBoarding.JobOffers.JobOfferIndex', compact('applicants'));
    }

    public function GetAllTodaysJobOffer()
    {
        $applicants = IsForJobOffer::with('applicantFinal')
            ->where('isDone', false)
            ->where('isOnBoarding', false)
            ->where('isRejected', false)
            ->whereDate('date', Carbon::today()) // Filter by today's date
            ->orderBy('time', 'ASC')
            ->orderBy('id', 'DESC')
            ->get();
        return view('Admin.OnBoarding.JobOffers.TodaysJobOffer', compact('applicants'));
    }

    public function GetAllRejectedOffers()
    {
        $applicants = IsForJobOffer::with('applicantFinal')
            ->where('isDone', false)
            ->where('isOnBoarding', false)
            ->where('isRejected', true)
            ->get();
        return view('Admin.OnBoarding.JobOffers.RejectedOffers', compact('applicants'));
    }


    public function MarkAsDoneJobOffer($id)
    {
        $jobOffer = IsForJobOffer::find($id);

        if ($jobOffer) {
            $jobOffer->update([
                'isDone' => true,
                'isOnBoarding' => true,
                'isRejected' => false
            ]);
        }

        Alert::success('Success', 'This Candidate will proceed next to on boarding');
        return redirect()->back();
    }

    public function MarkAsRejected($id)
    {
        $jobOffer = IsForJobOffer::find($id);
        if ($jobOffer) {
            // Proceed with the update if the job offer exists
            $jobOffer->update([
                'isDone' => false,
                'isOnBoarding' => false,
                'isRejected' => true
            ]);
            Alert::info('Success', 'The job offer was set as rejected');
        } else {
            // Handle the case where the job offer was not found
            Alert::error('Error', 'Job offer not found');
        }
        return redirect()->back();
    }
}
