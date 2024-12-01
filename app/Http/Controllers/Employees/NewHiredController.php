<?php

namespace App\Http\Controllers\Employees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Employees\EmployeeTraining;
use App\Models\OnBoarding\OnBoardingApplicationForm;

class NewHiredController extends Controller
{
    public function GetAllNewHiredEmployeeDocuments()
    {
        $new_employees = OnBoardingApplicationForm::where('approved', false)->get();
        return view('Admin.Employees.NewHiredEmployees.NewHiredIndex', compact('new_employees'));
    }

    public function ScheduleForTraining(Request $request, $id)
    {
        $validatedData = $request->validate([
            'training_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate', // enddate must be after startdate
            'notes' => 'nullable|string|max:500',
        ]);

        $training = new EmployeeTraining();
        $training->employee_id = $id;
        $training->training_title = $validatedData['training_title'];
        $training->department = $validatedData['department'];
        $training->location = $validatedData['location'];
        $training->startdate = $validatedData['startdate'];
        $training->enddate = $validatedData['enddate'];
        $training->notes = $validatedData['notes'];
        $training->save();

        if ($training) {

            $employee = OnBoardingApplicationForm::findOrFail($id);
            
            $employee->update([
                'status' => 'OnTraning'
            ]);

            Alert::success('Success', 'The Employee has been scheduled for training.');
            return redirect()->back();
        }else{
            Alert::error('Error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
