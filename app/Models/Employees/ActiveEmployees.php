<?php

namespace App\Models\Employees;

use App\Models\OnBoarding\OnBoardingApplicationForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveEmployees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'employee_id',
        'status'
    ];

    public function ActiveEmployee()
    {
        return $this->belongsTo(OnBoardingApplicationForm::class, 'employee_id');
    }
}
