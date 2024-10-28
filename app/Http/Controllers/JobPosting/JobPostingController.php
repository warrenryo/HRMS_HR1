<?php

namespace App\Http\Controllers\JobPosting;

use Illuminate\Http\Request;
use App\Enums\EmploymentType;
use App\Enums\EmploymentSetup;
use App\Http\Controllers\Controller;
use App\Models\JobPosting\JobSkills;
use App\Models\JobPosting\JobPosting;
use App\Models\JobPosting\JobQualifications;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\JobPosting\JobResponsibilities;

class JobPostingController extends Controller
{
    public function index()
    {
        $employment_enum = EmploymentType::cases();
        $employment_setup = EmploymentSetup::cases();
        $jobs = JobPosting::orderBy('id', 'DESC')->get();
        return view("Admin.JobPosting.JobPostingIndex", compact(
            'employment_enum',
            'jobs',
            'employment_setup'
        ));
    }

    public function createJob(Request $request)
    {
        $job_posting = new JobPosting;

        try {
            $job_posting = JobPosting::create([
                'title' => $request->title,
                'employment_type' => $request->employment_type,
                'location' => $request->location,
                'role_description' => $request->role_description,
                'benefits' => $request->benefits,
                'schedule' => $request->schedule,
                'salary_from' => $request->salary_from,
                'salary_to' => $request->salary_to,
                'close_date' => $request->close_date,
            ]);

            // Create related responsibilities, skills, and qualifications
            foreach ($request->responsibilities as $responsibility) {
                $job_posting->jobResponsibilities()->create([
                    'responsibilities' => $responsibility
                ]);
            }

            foreach ($request->skills as $skill) {
                $job_posting->jobSkills()->create([
                    'skills' => $skill
                ]);
            }

            foreach ($request->qualifications as $qualification) {
                $job_posting->jobQualifications()->create([
                    'qualifications' => $qualification
                ]);
            }

            foreach ($request->setup as $setup) {
                $job_posting->jobSetup()->create([
                    'setup' => $setup
                ]);
            }

            Alert::success('Job has been created');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return redirect()->back();
        }
    }

    public function editJob(Request $request, $id)
    {
        $job_posting = JobPosting::where('id', $id)->first();

        try {
            $job_posting->update([
                'title' => $request['title'],
                'employment_type' => $request['employment_type'],
                'location' => $request['location'],
                'role_description' => $request['role_description'],
                'benefits' => $request['benefits'],
                'schedule' => $request['schedule'],
                'close_date' => $request['close_date'],
                'salary_from' => $request['salary_from'],
                'salary_to' => $request['salary_to']
            ]);

            $existingSetups = $job_posting->jobSetup()->pluck('setup')->toArray();
            $setupsToDelete = array_diff($existingSetups, $request->setup ?? []);

            foreach ($setupsToDelete as $setupToDelete) {
                $job_posting->jobSetup()->where('setup', $setupToDelete)->delete();
            }

            // Add new setups
            if ($request->has('setup')) {
                foreach ($request->setup as $setup) {
                    if (!in_array($setup, $existingSetups)) {
                        $job_posting->jobSetup()->create(['setup' => $setup]);
                    }
                }
            }

            // Update existing responsibilities
            if ($request->has('responsibilities')) {
                foreach ($request->responsibilities as $id => $responsibility) {
                    $existingResponsibility = $job_posting->jobResponsibilities()->find($id);
                    if ($existingResponsibility) {
                        $existingResponsibility->update(['responsibilities' => $responsibility]);
                    }
                }
            }

            // Add new responsibilities
            if ($request->has('new_responsibilities') && !empty($request->new_responsibilities)) {
                foreach ($request->new_responsibilities as $responsibility) {
                    $job_posting->jobResponsibilities()->create(['responsibilities' => $responsibility]);
                }
            }

            // Update existing skills
            if ($request->has('skills')) {
                foreach ($request->skills as $id => $skill) {
                    $existingSkill = $job_posting->jobSkills()->find($id);
                    if ($existingSkill) {
                        $existingSkill->update(['skills' => $skill]);
                    }
                }
            }

            // Add new skills
            if ($request->has('new_skills') && !empty($request->new_skills)) {
                foreach ($request->new_skills as $skill) {
                    $job_posting->jobSkills()->create(['skills' => $skill]);
                }
            }

            // Update existing qualifications
            if ($request->has('qualifications')) {
                foreach ($request->qualifications as $id => $qualification) {
                    $existingQualification = $job_posting->jobQualifications()->find($id);
                    if ($existingQualification) {
                        $existingQualification->update(['qualifications' => $qualification]);
                    }
                }
            }

            // Add new qualifications
            if ($request->has('new_qualifications') && !empty($request->new_qualifications)) {
                foreach ($request->new_qualifications as $qualification) {
                    $job_posting->jobQualifications()->create(['qualifications' => $qualification]);
                }
            }

            Alert::success('Job has been Updated');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return redirect()->back();
        }
    }

    public function destroyResponsibility($id)
    {
        $responsibility = JobResponsibilities::find($id);

        if ($responsibility) {
            $responsibility->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function destroySkills($id)
    {
        $skills = JobSkills::find($id);

        if ($skills) {
            $skills->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function destroyQualifications($id)
    {
        $qualifications = JobQualifications::find($id);

        if ($qualifications) {
            $qualifications->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function deleteJob($id)
    {
        $job = JobPosting::find($id);
        if ($job) {
            $job->delete();
            Alert::success('Job ' . $job->title . ' has been deleted');

            return redirect()->back();
        }
    }
}
