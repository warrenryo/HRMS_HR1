<?php

namespace App\Models\JobPostingApplicant;

use App\Models\JobPosting\JobPosting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;
    protected $table = 'applicants';
    protected $fillable = [
        'user_id', 'job_id', 'first_name', 'last_name', 'email', 'prev_job_title', 'prev_company', 'answers', 'resume_path','phone','city_state'
    ];

    public function userApplicant()
    {
        return $this->belongsTo(User::class);
    }

    public function applicantAnswer()
    {
        return $this->hasMany(ApplicantAnswer::class, 'applicant_id', 'id');
    }

    public function jobApplied()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }       
}
