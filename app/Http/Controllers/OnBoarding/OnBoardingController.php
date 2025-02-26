<?php

namespace App\Http\Controllers\OnBoarding;

use App\Models\OnBoarding\OnBoardingApplicationForm;
use Carbon\Carbon;
use App\Mail\HRMailer;
use Illuminate\Support\Str;
use App\Mail\OnBoardingMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\OnBoarding\Onboarding;
use App\Models\Interviews\IsForJobOffer;
use App\Models\JobPosting\JobPosting;
use App\Models\JobPostingApplicant\Applicants;
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
                $onBoarding->applicant_id
            ));
            
            Alert::success('OnBoarding Application Sent', 'The OnBoarding Application has been send to '.$onBoarding->applicantFinal->email.'');
            return redirect()->back();
        }
    }

    public function GetOnBoardingForms()
    {
        $applicants = Onboarding::with('onBoarding')
        ->where('forApproval', false)
        ->get();
        
        return view('Admin.OnBoarding.OnBoardingEmployees.GetOnBoardingForms', compact('applicants'));
    }

    public function OnBoardingForm($id)
    {
        $randomString = Str::random(6);

        // Ensure the string contains only numbers (optional: modify as needed)
        $random = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
    
        return view('Admin.OnBoarding.OnBoardingEmployees.OnBoardingApplicationForm', compact('id','random'));
    }

    public function SubmitOnBoardingForm(Request $request, $id)
    {
        try {
            // Validate the input
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);
    
            // Handle file upload
            $fileName = null;
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                // Generate a unique filename
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                
                // Store the file in the 'public/profile' directory
                $file->storeAs('public/profile', $fileName);
            }


            $applicant_info = Applicants::findOrFail($id);

            $job_position = JobPosting::where('id', $applicant_info->job_id)->first();
    
            // Create the onboarding application record
            $submitted = OnBoardingApplicationForm::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'position' => $job_position->title,
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'civil_status' => $request->civil_status,
                'number' => $request->phone,
                'address' => $request->address,
                'sss' => $request->sss,
                'tin' => $request->tin,
                'philhealth' => $request->philhealth,
                'pagibig' => $request->pagibig,
                'profile' => $fileName,  // Store the file name in the database
            ]);
    
            // Check if the submission was successful
            if ($submitted) {
                $applicants = Onboarding::with('onBoarding')
                ->where('applicant_id', $id)
                ->where('status', false)
                ->where('forApproval', false)
                ->first();

                if($applicants)
                {
                    $applicants->update([
                        'status' => true
                    ]);
                }
                return redirect('/success-page');
            } else {
                Alert::error('Error', 'Submission Failed');
                return redirect()->back();
            }
    
        } catch (\Throwable $th) {
            // Catch any unexpected exceptions and show the error message
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function SuccessPage()
    {
        return view('AdminComponents.Modals.Onboarding.OnBoardingEmployee.SuccessSubmitted');
    }
    
}
