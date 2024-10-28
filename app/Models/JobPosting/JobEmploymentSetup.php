<?php

namespace App\Models\JobPosting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEmploymentSetup extends Model
{
    use HasFactory;
    protected $table = 'job_posting_employment_setup';
    protected $fillable = [
        'setup'
    ];
}
