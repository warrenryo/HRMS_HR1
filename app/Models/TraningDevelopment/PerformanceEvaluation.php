<?php

namespace App\Models\TraningDevelopment;

use App\Models\OnBoarding\OnBoardingApplicationForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceEvaluation extends Model
{
    use HasFactory;
    protected $table = 'employee_performance_evaluation';
    protected $fillable = [
        'employee_id',
        'training_id',
        'criteria',
        'ratings',
        'comments'
    ];
}
