<?php

namespace App\Models\JobPostingApplicant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAnswer extends Model
{
    use HasFactory;
    protected $table = 'applicant_answer';
    protected $fillable = [
        'employer_question_id',
        'applicant_id',
        'applicant_answer'
    ];

    public function applicantCheckboxAnswer()
    {
        return $this->hasMany(ApplicantAnswerCheckbox::class,'checkbox_answers_id','id');
    }
}
