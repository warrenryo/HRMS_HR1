<?php

namespace App\Http\Controllers\JobPortal;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPosting\JobPosting;
use Illuminate\Support\Facades\Validator;
use App\Models\JobPosting\EmployerQuestions;
use App\Models\JobPostingApplicant\Applicants;
use App\Models\JobPosting\EmployerCheckboxOptions;
use App\Models\JobPostingApplicant\ApplicantAnswer;
use App\Models\JobPostingApplicant\ApplicantAnswerCheckbox;

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
            $file = $request->file('resume');
    
            // Define the path to store the file in the public folder
                    $path = public_path('resumes');  // This will store the file in the public/resumes folder
                    
                    // Make sure the directory exists
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);  // Create the folder if it doesn't exist
                    }
                    
                    // Generate a unique filename (you can change this logic as needed)
                    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                    
                    // Move the file to the public folder
                    $file->move($path, $fileName);
                    
                    // Return the file path
                    $resumePath = $fileName;
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


        $resumeText = $this->parseResume(public_path('resumes/' . $resumePath));

        $jobDescription = JobPosting::findOrFail($jobId)->role_description;

        // Analyze the resume using AI (OpenAI)
        $aiScore = $this->analyzeResume($resumeText, $jobDescription);

        // Store the AI Score in the Applicants table or in a new table (optional)
        $application->AI_Prompt = $aiScore;  // Assuming there's an `ai_score` column in Applicants
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

        if ($request->has('checkbox_answers')) {
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

        // $job_applied = Applicants::where('user_id', Auth::user()->id)->first();

        return redirect()->route('reviewFormApplication', ['job_applied_id' => $application->id, 'job_id' => $jobId]);
    }

    private function parseResume($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if ($extension === 'pdf') {
            return $this->parsePDF($filePath);
        }
        // } elseif ($extension === 'docx') {
        //     return $this->parseDOCX($filePath);
        // } else {
        //     return file_get_contents($filePath);  // For TXT files
        // }
    }

    private function parsePDF($filePath)
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($filePath);
        return $pdf->getText();
    }

    // private function parseDOCX($filePath)
    // {
    //     $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath);
    //     $text = '';
    //     foreach ($phpWord->getSections() as $section) {
    //         foreach ($section->getElements() as $element) {
    //             if ($element instanceof \PhpOffice\PhpWord\Element\Text) {
    //                 $text .= $element->getText() . ' ';
    //             }
    //         }
    //     }
    //     return $text;
    // }

    private function analyzeResume($resumeText, $jobDescription)
    {
        $result = OpenAi::chat()->create([
            "model" => "gpt-3.5-turbo",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 600,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant that can analyze resumes and job descriptions.',
                ],
                [
                    'role' => 'user',
                    'content' => sprintf('Analyze the following resume and job description and give a ratings from 1 to 10 if the applicant is passed on the said role. Give the final Ratings on the last of your sentence. Resume: %s Job Description: %s', $resumeText, $jobDescription),
                ],
            ],
        ]);

        $content = trim($result['choices'][0]['message']['content']);

        return $content;
    }


    public function reviewApplication($jobApplication_id, $job_id)
    {
        $application = Applicants::find($jobApplication_id);
        $job = JobPosting::find($job_id);

        return view('Sys.JobPortalApplication.ReviewForm', compact('application', 'job'));
    }
}