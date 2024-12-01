<?php

namespace App\Models\OnBoarding;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPostingApplicant\Applicants;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onboarding extends Model
{
    use HasFactory;
    protected $table = 'on_boarding';
    protected $fillable = [
        'applicant_id',
        'status',
        'forApproval'
    ];

    public function onBoarding()
    {
        return $this->belongsTo(Applicants::class, 'applicant_id');
    }
}
