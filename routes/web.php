<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\OnBoarding\PassedCandidates;
use App\Http\Controllers\Employees\NewHiredController;
use App\Http\Controllers\JobPortal\JobPortalController;
use App\Http\Controllers\OnBoarding\JobOffersController;
use App\Http\Controllers\JobPosting\JobPostingController;
use App\Http\Controllers\OnBoarding\OnBoardingController;
use App\Http\Controllers\ApplicantTracking\ApplicantsController;
use App\Http\Controllers\TrainingDevelopment\TrainingController;
use App\Http\Controllers\JobPortal\JobPortalApplicationController;
use App\Http\Controllers\ApplicantTracking\FinalInterviewsController;
use App\Http\Controllers\ApplicantTracking\InitialInterviewsController;
use App\Http\Controllers\Employees\ActiveEmployeesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'isAdmin'])->name('dashboard');


 //Job Portal
 Route::get('/', [JobPortalController::class, 'index']);
 Route::get('get-jobs/{id}', [JobPortalController::class,'getJobs']);

 //Application
 Route::get('apply/form/resume/{id}', [JobPortalApplicationController::class, 'resumeForm']);
 Route::post('apply/form/resume/for-review/{id}', [JobPortalApplicationController::class, 'reviewForm']);
 Route::get('apply/form/reviewForm/{job_applied_id}/{job_id}', [JobPortalApplicationController::class,'reviewApplication'])->name('reviewFormApplication');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    //PLACE YOUR ROUTES HERE FOR VERIFIED USER

    //Company
    Route:
    Route::get('company/manage', [CompanyController::class, 'index']);
    Route::post('company/manage/create-company', [CompanyController::class, 'createCompany']);
    Route::patch('company/manage/isActive/{id}', [CompanyController::class, 'setIsActive']);
    Route::put('company/manage/edit-company/id={id}', [CompanyController::class,'editCompany']);
    Route::delete('company/manage/delete-company/id={id}', [CompanyController::class, 'deleteCompany']);

    //Job Posting 
    Route::get('job-posting/manage', [JobPostingController::class, 'index']);
    Route::post('job-posting/manage/create-job', [JobPostingController::class, 'createJob']);
    Route::put('job-posting/manage/edit-job/{id}', [JobPostingController::class, 'editJob']);
    Route::delete('job-posting/manage/delete-job/id={id}', [JobPostingController::class,'deleteJob']);
    Route::delete('delete-responsibility/{id}', [JobPostingController::class, 'destroyResponsibility']);
    Route::delete('delete-skills/{id}', [JobPostingController::class, 'destroySkills']);
    Route::delete('delete-qualifications/{id}', [JobPostingController::class, 'destroyQualifications']);
    Route::post('add-employer-questions/{id}', [JobPostingController::class, 'addQuestionSet']);

   
    //ATS
    Route::get('applicants/candidates', [ApplicantsController::class, 'index']);
    Route::post('add-candidate/{id}',[ApplicantsController::class,'addCandidate']);
    Route::get('candidates/all-candidates', [ApplicantsController::class,'GetAllCandidates']);
    Route::get('ai-candidate-prediction', [ApplicantsController::class, 'AIPredictionCandidate']);
    Route::get('ai-response/{ai_response_id}', [ApplicantsController::class, 'AIResponseFunction'])->name('ai_response');
    Route::get('show-candidate/{candidate_id}/{job_id}', [ApplicantsController::class, 'showCandidate']);
    Route::post('schedule-initial-interview/{applicant_id}/{session_id}', [ApplicantsController::class,'ScheduleInterview']);
    Route::post('schedule-initial-interview-index/{applicant_id}', [ApplicantsController::class,'ScheduleInterviewIndex']);
    //Initial Inteviews
    Route::get('initial-interviews/all-interviews', [InitialInterviewsController::class, 'GetAllInitialInterviews']);
    Route::get('initial-interviews/todays-interview', [InitialInterviewsController::class,'GetTodaysInterview']);
    Route::post('mark-as-done/{id}' ,[InitialInterviewsController::class, 'MarkAsDone']);
    Route::get('initial-interviews/done-interviews', [InitialInterviewsController::class,'GetDoneInterviews']);
    Route::post('final-schedule-interview/{id}', [InitialInterviewsController::class,'ScheduleFinalInterview']);
    Route::post('evaluate-initial/{id}', [InitialInterviewsController::class,'MarkAsDone']);
    //Final Interviews
    Route::get('final-interviews/all-interviews', [FinalInterviewsController::class,'GetAllFinalInterviews']);
    Route::get('final-interviews/todays-final-interview', [FinalInterviewsController::class, 'GetAllTodaysFinalInterviews']);
    Route::get('final-interviews/done-interviews', [FinalInterviewsController::class, 'GetDoneInterviews']);
    Route::post('mark-as-done-final/{id}' ,[FinalInterviewsController::class, 'MarkAsDone']);
    Route::post('mark-as-passed/{id}', [FinalInterviewsController::class, 'MarkAsPassed']);
    Route::post('schedule-job-offer/{id}', [FinalInterviewsController::class, 'ScheduleJobOffer']);
    Route::post('evaluate-final/{id}', [FinalInterviewsController::class,'MarkAsDone']);
    //Passed Candidates
    Route::get('applicants/passed-candidates', [PassedCandidates::class, 'GetAllPassedCandidates']);

    //Job Offers
    Route::get('job-offers/all-job-offers', [JobOffersController::class, 'GetAllJobOffers']);
    Route::get('job-offers/todays-job-offers', [JobOffersController::class, 'GetAllTodaysJobOffer']);
    Route::get('job-offers/rejected-offers', [JobOffersController::class, 'GetAllRejectedOffers']);
    Route::post('mark-as-done-job-offer/{id}', [JobOffersController::class, 'MarkAsDoneJobOffer']);
    Route::post('mark-as-rejected-job-offer/{id}', [JobOffersController::class, 'MarkAsRejected']);

    //On Boarding 
    Route::get('on-boarding/all-on-boarding', [OnBoardingController::class, 'GetAllOnBoarding']);
    Route::post('send-email-onboarding/{id}', [OnBoardingController::class, 'SendEmailOnBoarding']);
    Route::get('onboarding-application-{id}', [OnBoardingController::class, 'OnBoardingForm']);
    Route::get('get-onboarding-forms', [OnBoardingController::class, 'GetOnBoardingForms']);
    Route::post('submit-onboarding-form/{id}', [OnBoardingController::class, 'SubmitOnBoardingForm']);
    Route::get('success-page', [OnBoardingController::class, 'SuccessPage']);

    //Employees
    Route::get('employees/new-hired', [NewHiredController::class, 'GetAllNewHiredEmployeeDocuments']);
    Route::post('schedule-training/{id}', [NewHiredController::class, 'ScheduleForTraining']);
    Route::get('employees/active-employees', [ActiveEmployeesController::class, 'GetAllActiveEmployees']);
    

    //Training and Development
    Route::get('/training/training-monitoring', [TrainingController::class, 'GetAllTraining']);
    Route::post('evaluate-performance/{training_id}', [TrainingController::class, 'EvaluateEmployeeTraining']);
    Route::get('training/on-progress', [TrainingController::class, 'GetAllOnProgressTraining']);
    Route::get('training/done-training', [TrainingController::class, 'GetAllDoneTraining']);
    Route::post('move-active-employee/{emp_id}', [TrainingController::class, 'MoveToActiveEmployee']);

    //APPS
    Route::get('apps-todolist', [HomeController::class, 'todolist']);
});


require __DIR__.'/auth.php';
