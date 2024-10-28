<?php

namespace App\Models\JobPosting;

use App\Models\JobPosting\JobSkills;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPosting\JobQualifications;
use App\Models\JobPosting\JobEmploymentSetup;
use App\Models\JobPosting\JobResponsibilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPosting extends Model
{
    use HasFactory;
    protected $casts = [
        'setup' => 'json', // Automatically handles JSON encoding/decoding
    ];
    protected $table = 'job_posting';
    protected $fillable = [
        'title',
        'employment_type',
        'location',
        'role_description',
        'benefits',
        'schedule',
        'setup',
        'salary_from',
        'salary_to',
        'status',
        'isActive',
        'close_date'
    ];

    public function jobQualifications()
    {
        return $this->hasMany(JobQualifications::class, 'job_posting_id', 'id');
    }

    public function jobResponsibilities()
    {
        return $this->hasMany(JobResponsibilities::class,'job_posting_id','id');
    }

    public function jobSkills()
    {
        return $this->hasMany(JobSkills::class,'job_posting_id','id');
    }

    public function jobSetup()
    {
        return $this->hasMany(JobEmploymentSetup::class,'job_posting_id','id');
    }
}
