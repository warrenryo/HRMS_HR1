<?php

namespace App\Models\Interviews;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluateInitialInterview extends Model
{
    use HasFactory;
    protected $table = 'evaluate_initial_interview';
    protected $fillable = [
        'applicanit_d',
        'criteria',
        'ratings',
        'comments'
    ];

    
}
