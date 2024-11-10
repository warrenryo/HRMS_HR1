<?php

namespace App\Models\JobPostingApplicant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAnswerCheckbox extends Model
{
    use HasFactory;
    protected $table = 'applicant_answer_checkbox';
    protected $fillable = [
        'checkbox_answers_id',
        'applicant_id',
        'checkbox_answers'
    ];


    
}
