<?php

namespace App\Models\JobPosting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkills extends Model
{
    use HasFactory;
    protected $table = 'job_posting_skills';
    protected $fillable = [
        'skills'
    ];
}
