<?php

namespace App\Models\Interviews;

use App\Models\JobPostingApplicant\Applicants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialInterviewCandidate extends Model
{
    use HasFactory;
    protected $table = 'schedule_initial_interview';
    protected $fillable = [
        'applicant_id',
        'isForFinalInterview',
        'date',
        'time',
        'via',
        'link'
    ];

    public function applicantInitial()
    {
        return $this->belongsTo(Applicants::class, 'applicant_id');
    }
}
