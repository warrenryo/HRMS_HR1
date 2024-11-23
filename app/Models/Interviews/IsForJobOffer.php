<?php

namespace App\Models\Interviews;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPostingApplicant\Applicants;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IsForJobOffer extends Model
{
    use HasFactory;
    protected $table = 'is_for_job_offer';
    protected $fillable = [
        'applicant_id',
        'isOnBoarding',
        'isRejected',
        'email_sent',
        'date',
        'time',
        'isDone'
    ];

    public function applicantFinal()
    {
        return $this->belongsTo(Applicants::class, 'applicant_id');
    }
}
