<?php

namespace App\Http\Controllers\OnBoarding;

use Carbon\Carbon;
use App\Mail\HRMailer;
use Illuminate\Support\Str;
use App\Mail\OnBoardingMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\OnBoarding\Onboarding;
use App\Models\Interviews\IsForJobOffer;
use RealRashid\SweetAlert\Facades\Alert;

class OnBoardingController extends Controller
{
    public function GetAllOnBoarding()
    {
        $applicants = IsForJobOffer::with('applicantFinal')
        ->where('isDone', true)
        ->where('isOnBoarding', true)
        ->where('isRejected', false)
        ->where('email_sent', false)
        ->get();
        
        return view('Admin.OnBoarding.OnBoardingEmployees.OnBoarding', compact('applicants'));
    }

    public function SendEmailOnBoarding($id)
    {
        $onBoarding = IsForJobOffer::with('applicantFinal')
        ->where('id', $id)
        ->where('isOnBoarding', true)
        ->where('email_sent', false)
        ->first();

        if($onBoarding)
        {

            $onBoarding->update([
                'email_sent' => true
            ]);

            Onboarding::create([
                'applicant_id' => $onBoarding->applicant_id,
            ]);

            Mail::to($onBoarding->applicantFinal->email)
            ->cc('paradise.hotel@gmail.com')
            ->bcc('hr.hotel@gmail.com')
            ->send(new OnBoardingMail(
                $onBoarding->applicantFinal->first_name,
                $onBoarding->applicantFinal->last_name,
                $onBoarding->id
            ));
            
            Alert::success('OnBoarding Application Sent', 'The OnBoarding Application has been send to '.$onBoarding->applicantFinal->email.'');
            return redirect()->back();
        }
    }

    public function OnBoardingForm($id)
    {
        $randomString = Str::random(6);

        // Ensure the string contains only numbers (optional: modify as needed)
        $random = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
    
        return view('Admin.OnBoarding.OnBoardingEmployees.OnBoardingApplicationForm', compact('id','random'));
    }
}
