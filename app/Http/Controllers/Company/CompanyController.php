<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company\CompanyModel;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    public function index()
    {
        $data = CompanyModel::orderBy('id', 'DESC')->get();
        return view('Admin.Company.CompanyIndex', compact('data'));
    }

    public function createCompany(Request $request)
    {
        $company = new CompanyModel;

        try {
            $createCompany = $company->create([
                'name' => $request['name'],
                'website' => $request['website'],
                'industry' => $request['industry'],
                'description' => $request['description'],
                'location' => $request['location'],
            ]);

            if ($createCompany) {
                Alert::success('Company has been created');
                return redirect()->back();
            } else {
                Alert::error('Creation Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Alert::error('Something went wrong');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function setIsActive($id, Request $request)
    {
        $company = CompanyModel::where('id', $id)->first();
        $company->isActive = $request->isActive;
        $company->save();

        return response()->json(['message' => 'Company status updated successfully!']);
    }

    public function editCompany(Request $request, $id)
    {
        $company_id = CompanyModel::where('id', $id)->first();


        try {
            if ($company_id != null) {
                $company = $company_id->update([
                    'name' => $request['name'],
                    'website' => $request['website'],
                    'industry' => $request['industry'],
                    'description' => $request['description'],
                    'location' => $request['location'],
                ]);
                if ($company) {
                    Alert::success('Company ' . $request->name . ' was updated successfully.');
                    return redirect()->back();
                } else {
                    $message = 'Update Failed';
                    if ($request->expectsJson()) {
                        return response()->json(['error' => $message], 400);
                    } else {
                        Alert::error($message);
                        return redirect()->back();
                    }
                }
            } else {
                $message = 'No Company Found';
                if ($request->expectsJson()) {
                    return response()->json(['error' => $message], 404);
                } else {
                    Alert::error($message);
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            if ($request->expectsJson()) {
                return response()->json(['error' => $errorMessage], 500);
            } else {
                Alert::error($errorMessage);
                return redirect()->back()->with('error', $errorMessage);
            }
        }
    }

    public function deleteCompany($id)
    {
        $company_id = CompanyModel::where('id', $id)->first();

        if ($company_id != null) {
            $company_id->delete();
            Alert::success('Company'.$company_id->name.' has been deleted');
            return redirect()->back();
        }else{
            $message = 'Delete Failed';
            Alert::error($message);
            return redirect()->back();
        }
    }
}
