<?php

namespace App\Http\Controllers\OnBoarding;

use App\Http\Controllers\Controller;
use App\Models\Interviews\IsForJobOffer;
use Illuminate\Http\Request;

class JobOffersController extends Controller
{
    public function GetAllJobOffers()
    {
        $applicants = IsForJobOffer::with('applicantFinal')->where('isDone', false)->where('isOnBoarding', false)->get();

        return view('Admin.OnBoarding.JobOffers.JobOfferIndex', compact('applicants'));
    }
}
