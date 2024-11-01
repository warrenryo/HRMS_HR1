<?php

namespace App\Models\JobPosting;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPosting\EmployerCheckboxOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployerQuestions extends Model
{
    use HasFactory;
    protected $table = 'employer_questions';
    protected $fillable = [
        'job_posting_id',
        'questions',
        'checkbox_answer',
        'q_type'
    ];

    public function employerCheckboxOptions()
    {
        return $this->hasMany(EmployerCheckboxOptions::class,'employer_questions_id','id');
    }
}
