<?php

namespace App\Models\JobPosting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQualifications extends Model
{
    use HasFactory;
    protected $table = 'job_posting_qualifications';
    protected $fillable = [
        'qualifications'
    ];
}
