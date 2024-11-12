<?php

namespace App\Models\AIModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIPredictionResponse extends Model
{
    use HasFactory;
    protected $table = 'ai_prediction_response';
    protected $fillable = [
        'candidate_name',
        'candidate_id',
        'responses_session',
        'job_title',
        'candidate_resume',
        'ai_response',
        'ai_ratings',
        'isSelected'
    ];
}
