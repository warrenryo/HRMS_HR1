<?php

namespace App\Http\Controllers\ApplicantTracking;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\AIModels\AIPredictionResponse;
use App\Models\Interviews\InitialInterviewCandidate;
use App\Models\JobPosting\JobPosting;
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

    public function AIPredictionCandidate()
    {
        $candidates = Candidates::with('jobApplicantCandidate')->where('isForInteview', false)->get(); // Example filter for 'selected' candidates

        // Initialize an array to store the results
        $results = [];
        $randomNumber = rand(1, 1000);
        foreach ($candidates as $candidate) {
            // Find the associated job posting
            $job = JobPosting::find($candidate->jobApplicantCandidate->job_id);
    
            if ($job) {
                // Get the resume file path and parse the resume into text
                $resumePath = $candidate->jobApplicantCandidate->resume_path;
                $resumeText = $this->parseResume(storage_path('app/public/' . $resumePath));
    
                // Call the AI to analyze the resume and job description
                $aiScore = $this->analyzeResume($resumeText, $job->role_description, $candidate->jobApplicantCandidate->prev_job_title);
                $aiRatings = $this->analyzeAiRatings($resumeText, $job->role_description, $aiScore);
                $formattedResponse = str_replace("\n", " ", $aiScore);

                // Optionally, you can also remove multiple spaces if they occur
                $formattedResponse = preg_replace('/\s+/', ' ', $formattedResponse);
                $candidate_name = $candidate->jobApplicantCandidate->first_name .' '. $candidate->jobApplicantCandidate->last_name;
                // Store the result, you could also store it in the database if necessary
     
                $response = AIPredictionResponse::create([
                    'candidate_id' => $candidate->id,
                    'candidate_resume' => $candidate->jobApplicantCandidate->resume_path,
                    'candidate_name' => $candidate_name,
                    'responses_session'=> $randomNumber,
                    'job_title' => $job->title,
                    'ai_response' => $formattedResponse,
                    'ai_ratings' => $aiRatings
                ]);
                // $results[] = [
                //     'candidate_id' => $candidate->id,
                //     'candidate_resume' => $candidate->jobApplicantCandidate->resume_path,
                //     'candidate_name' => $candidate_name,
                //     'job_title' => $job->title,
                //     'ai_score' => $formattedResponse,
                //     'ai_ratings' => $aiRatings
                // ];
             
            } else {
                // If no job posting found for the candidate, log or handle as needed
                Log::warning("Job not found for candidate ID: " . $candidate->id);
            }
        }
    
        // You can either return the results to the frontend, log them, or store them in the database
        // return view('Admin.ATS.AIPredictionIndex', compact('results'));
        // return response()->json($results);
        return redirect()->route('ai_response', ['ai_response_id' => $randomNumber]);
    }

    public function AIResponseFunction($ai_session)
    {
        $response = AIPredictionResponse::where('responses_session', $ai_session)->where('isSelected', false)->get();

        return view('Admin.ATS.AIPredictionIndex', compact('response'));
    }
    
    
        private function parseResume($filePath)
    {
        // Use a PDF parser library (e.g., smalot/pdfparser)
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();

        // Clean up the text if necessary (e.g., remove excessive whitespace)
        return trim($text);
    }

    private function analyzeResume($resumeText, $jobDescription, $prev_job)
    {
        try {
            $additionalInfo1 = "if the candidate has this and related to job description" . htmlspecialchars($prev_job);
            $additionalInfo2 = "Please predict the success carefully";

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
                        'content' => 'You are a helpful assistant that can analyze resumes and job descriptions to predict the candidate’s success for a particular role.',
                    ],
                    [
                        'role' => 'user',
                        'content' => sprintf(
                            'Analyze the following resume: %s, and job description: %s. Predict the success of the candidate based on these and give a success percentage at the end. Consider the candidate’s experience and remove any "\n" or "\n\n": %s and skills: %s.',
                                htmlspecialchars($resumeText),  // Resume text
                                htmlspecialchars($jobDescription),  // Job description
                                htmlspecialchars($additionalInfo1),  // Candidate experience
                                htmlspecialchars($additionalInfo2)   // Candidate skills/ Escape special characters
                        ),
                    ],
                ],
            ]);
    
            // Extract and return the AI's evaluation result
            $content = trim($result['choices'][0]['message']['content']);
            return $content;
        } catch (\Exception $e) {
            // Handle errors, log them, and return a fallback message
            Log::error('Error analyzing resume: ' . $e->getMessage());
            return 'Error analyzing the resume.';
        }
    }

    private function analyzeAiRatings($resumeText, $jobDescription, $aiResponse)
    {
        try {
            $additionalInfo1 = "Candidate has 5 years of experience in data science.";
            $additionalInfo2 = "depend your response to this ". htmlspecialchars($aiResponse);

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
                        'content' => sprintf(
                            'Analyze the following resume and job description. Predict the success of the candidate depending on the job description and give the ratings like even numbers from 2 to 10 your response must be number only no other text. Resume: %s Job Description: %s',
                             htmlspecialchars($resumeText),  // Escape special characters to prevent XSS
                                    htmlspecialchars($jobDescription),
                                    htmlspecialchars($additionalInfo2) // Escape special characters
                        ),
                    ],
                ],
            ]);
    
            // Extract and return the AI's evaluation result
            $content = trim($result['choices'][0]['message']['content']);
            return $content;
        } catch (\Exception $e) {
            // Handle errors, log them, and return a fallback message
            Log::error('Error analyzing resume: ' . $e->getMessage());
            return 'Error analyzing the resume.';
        }
    }


    public function showCandidate($candidate_id, $session_id)
    {
        $applicant = Candidates::with('jobApplicantCandidate')->where('id', $candidate_id)->where('isForInteview', false)->first();
        $ai_score = AIPredictionResponse::where('candidate_id', $candidate_id)->where('responses_session', $session_id)->first();

        return view('AdminComponents.Modals.ATS.AIPredictionPage', compact('applicant', 'session_id','ai_score'));
    }


    public function ScheduleInterview(Request $request, $applicant_id, $session_id)
    {
        $candidate = Candidates::where('applicant_id', $applicant_id)->where('isForInteview', false)->first();
        $ai_response_model = AIPredictionResponse::where('candidate_id', $candidate->id)->where('isSelected', false)->first();
        $initial = new InitialInterviewCandidate();

        if($initial)
        {
            $candidate->update([
                'isForInteview' => true,
            ]);

            $ai_response_model->update([
                'isSelected' => true
            ]);
            
            $initial->create([
                'date' => $request->date,
                'time' => $request->time,
                'via' => $request->via,
                'link' => $request->link,
                'applicant_id' => $applicant_id
            ]);

            Alert::success('Success', 'This applicant has been added to Initial Interviews');
            return redirect('ai-response/'.$session_id);
        }
    }

}
