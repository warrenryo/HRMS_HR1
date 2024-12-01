<?php

namespace App\Models\Employees;

use App\Models\OnBoarding\OnBoardingApplicationForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    use HasFactory;
    protected $table = 'employee_training';
    protected $fillable = [
        'training_title',
        'department',
        'location',
        'startdate',
        'enddate',
        'notes',
        'status',
        'employee_id'
    ];

    public function EmployeeTraining()
    {
        return $this->belongsTo(OnBoardingApplicationForm::class, 'employee_id');
    }
}
