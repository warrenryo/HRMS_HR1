<?php

namespace App\Models\JobPosting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResponsibilities extends Model
{
    use HasFactory;
    protected $table = 'job_posting_responsibilities';
    protected $fillable = [
        'responsibilities'
    ];
}
