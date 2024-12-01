<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employees\ActiveEmployees;
use Illuminate\Http\Request;

class ActiveEmployeesController extends Controller
{
    public function GetAllActiveEmployees()
    {
        $new_employees = ActiveEmployees::with('ActiveEmployee')->get();
        return view('Admin.Employees.ActiveEmployees.AllEmployees', compact('new_employees'));
    }
}
