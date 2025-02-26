<?php

namespace App\Models\Interviews;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluateFinalIntervieww extends Model
{
    use HasFactory;
    protected $table = 'evaluate_final_interview';
    protected $fillable = [
        'applicant_id',
        'criteria',
        'ratings',
        'comments'
    ];

}
