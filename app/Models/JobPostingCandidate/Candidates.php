<?php

namespace App\Models\JobPostingCandidate;

use App\Models\JobPostingApplicant\Applicants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    protected $fillable = [
        'applicant_id',
        'isForInteview'
    ];

    public function jobApplicantCandidate()
    {
        return $this->belongsTo(Applicants::class, 'applicant_id');
    }
}
