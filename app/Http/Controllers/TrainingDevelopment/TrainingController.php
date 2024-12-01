<?php

namespace App\Http\Controllers\TrainingDevelopment;

use Illuminate\Http\Request;
use Akaunting\Apexcharts\Chart;
use App\Charts\EmployeePerformance;
use App\Http\Controllers\Controller;
use App\Models\Employees\ActiveEmployees;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Employees\EmployeeTraining;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\OnBoarding\OnBoardingApplicationForm;
use App\Models\TraningDevelopment\PerformanceEvaluation;

class TrainingController extends Controller
{
    public function GetAllTraining()
    {
        $employees = EmployeeTraining::with('EmployeeTraining')
            ->get();

        return view('Admin.TrainingDevelopment.AllTraining', [
            'employees' => $employees,
        ]);
    }

    public function GetAllOnProgressTraining()
    {
        $employees = EmployeeTraining::with('EmployeeTraining')
            ->where('status', false)
            ->get();

        return view('Admin.TrainingDevelopment.OnProgressTraining', [
            'employees' => $employees,
        ]);
    }

    public function GetAllDoneTraining()
    {
        $employees = EmployeeTraining::with('EmployeeTraining')
            ->where('status', true)
            ->get();

        return view('Admin.TrainingDevelopment.DoneTraining', [
            'employees' => $employees,
        ]);
    }

    public function EvaluateEmployeeTraining(Request $request, $training_id)
    {
        $getEmployee_id = EmployeeTraining::findOrFail($training_id);

        foreach ($request->criteria as $index => $criteria) {
            PerformanceEvaluation::create([
                'employee_id' => $getEmployee_id->employee_id,
                'training_id' => $training_id,
                'criteria' => $criteria,
                'ratings' => $request->ratings[$index],
                'comments' => $request->comments[$index],
            ]);
        }

        $update_new_hired_records = OnBoardingApplicationForm::where('id', $getEmployee_id->employee_id)->first();

        if ($update_new_hired_records) {
            $update_new_hired_records->update([
                'status' => 'DoneTraining'
            ]);
        }

        $getEmployee_id->update([
            'status' => true
        ]);

        Alert::success('Success', 'The Evaluation Performance has been submitted');
        return redirect()->back();
    }

    public function MoveToActiveEmployee($employee_id)
    {
        $emptraining_id = OnBoardingApplicationForm::find($employee_id); 

        $active_employee = ActiveEmployees::create([
            'employee_id' => $emptraining_id->id
        ]);

        if($active_employee)
        {
            Alert::success('Success', 'This Employee has been moved to Active Employee');
            return redirect()->back();
        }else{
            Alert::error('Error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
