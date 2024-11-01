<?php

namespace App\Models\JobPosting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerCheckboxOptions extends Model
{
    use HasFactory;
    protected $table = 'employer_checkbox_options';
    protected $fillable = [
        'employer_questions_id',
        'options'
    ];
}
