<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPortal\JobPortalApplicationController;
use App\Http\Controllers\JobPortal\JobPortalController;
use App\Http\Controllers\JobPosting\JobPostingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

   


    //APPS
    Route::get('apps-todolist', [HomeController::class, 'todolist']);
});


require __DIR__.'/auth.php';
