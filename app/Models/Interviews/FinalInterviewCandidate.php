<?php

namespace App\Models\Interviews;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPostingApplicant\Applicants;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalInterviewCandidate extends Model
{
    use HasFactory;
    protected $table = 'schedule_final_interview';
    protected $fillable = [
        'applicant_id',
        'isForJobOffer',
        'finalInterviewDone',
        'date',
        'time',
        'via',
        'link',
        'isDone'
    ];

    public function applicantInitial()
    {
        return $this->belongsTo(Applicants::class, 'applicant_id');
    }
}
