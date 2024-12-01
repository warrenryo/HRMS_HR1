<?php

namespace App\Models\OnBoarding;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnBoardingApplicationForm extends Model
{
    use HasFactory;
    protected $table = 'on_boarding_application_form';
    protected $fillable = [
        'firstname',
        'lastname',
        'profile',
        'email',
        'position',
        'birthdate',
        'gender',
        'civil_status',
        'number',
        'address',
        'sss',
        'tin',
        'status',
        'philhealth',
        'pagibig'
    ];
}
