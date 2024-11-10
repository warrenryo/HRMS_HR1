<?php

namespace App\Http\Controllers\JobPortal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobPosting\EmployerCheckboxOptions;
use App\Models\JobPosting\EmployerQuestions;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPosting\JobPosting;
use App\Models\JobPostingApplicant\ApplicantAnswer;
use App\Models\JobPostingApplicant\ApplicantAnswerCheckbox;
use App\Models\JobPostingApplicant\Applicants;
use Illuminate\Support\Facades\Validator;

class JobPortalApplicationController extends Controller
{
    public function resumeForm($id)
    {
        $job = JobPosting::find($id);
        return view('Sys.JobPortalApplication.ResumeForm', compact('job'));
    }

    public function reviewForm(Request $request, $jobId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'required|file|mimes:pdf|max:2048',  // PDF only, max 2MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle the file upload for the resume
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
            // Store the file in the 'public' disk (e.g., storage/app/public)
            $resumePath = $request->file('resume')->store('resumes', 'public');
        } else {
            return back()->with('error', 'There was an issue uploading your resume.');
        }

        // Create the application entry in the database
        $application = new Applicants();
        $application->user_id = Auth::id(); // Associate the application with the authenticated user
        $application->job_id = $jobId;
        $application->first_name = $request->input('name');
        $application->last_name = $request->input('lastname');
        $application->email = $request->input('email');
        $application->phone = $request->input('number');
        $application->city_state = $request->input('city'); 
        $application->prev_job_title = $request->input('prev_job_title');
        $application->prev_company = $request->input('prev_company');
        $application->resume_path = $resumePath;
        $application->save();

        if ($request->has('answers')) {
            // Loop through each answer and store it
            foreach ($request->answers as $questionId => $answer) {
                // Assuming EmployerQuestions model exists and you want to store the answer
                $employer_question = EmployerQuestions::findOrFail($questionId);
                
                ApplicantAnswer::create([
                    'employer_question_id' => $employer_question->id,
                    'applicant_id' => $application->id,
                    'applicant_answer' => $answer
                ]);
            }
        }

        if($request->has('checkbox_answers'))
        {
            foreach ($request->checkbox_answers as $questionId => $checkboxAnswers) {
                // Iterate over the selected checkbox options for the given question
                foreach ($checkboxAnswers as $checkboxAnswer) {
                    // Find the employer checkbox option by its ID
                    $employer_checkbox_option = EmployerCheckboxOptions::where('employer_questions_id', $questionId)->first(); // This gives the option with the checkbox id
        
                    // Create a new ApplicantAnswerCheckbox record
                    ApplicantAnswerCheckbox::create([
                        'checkbox_answers_id' => $employer_checkbox_option->employer_questions_id,
                        'applicant_id' => $application->id,
                        'checkbox_answers' => $checkboxAnswer // Store the selected checkbox answer ID
                    ]);
                }
            }
        }

        $job_applied = Applicants::where('user_id', Auth::user()->id)->first();

        return redirect()->route('reviewFormApplication', ['job_applied_id' => $job_applied->id, 'job_id' => $jobId]);
    }


    public function reviewApplication($jobApplication_id, $job_id)
    {
        $application = Applicants::find($jobApplication_id);
        $job = JobPosting::find($job_id);

        return view('Sys.JobPortalApplication.ReviewForm', compact('application','job'));
    }
}
