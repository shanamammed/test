<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Company;
use App\Models\admin\Employee;

class ApiController extends Controller
{
    /*GET EMPLOYEES*/
    public function employees()
    {
         $employees= Employee::all();
         $res     = sendResponse('true',
                        $data     = $employees,
                        $message  = 'Success',
                        $code     = 200);
        return $res; 
    }
    
    /*GET COMPANIES*/
    public function companies()
    {
         $companies= Company::all();
         $res     = sendResponse('true',
                        $data     = $companies,
                        $message  = 'Success',
                        $code     = 200);
        return $res; 
    }

    /*GET A SINGLE EMPLOYEE*/
    public function getEmployee(Request $request)
    {
         $employee = Employee::find($request->id);
         if($employee) {
            $res     = sendResponse('true',
                        $data     = $employee,
                        $message  = 'Success',
                        $code     = 200);
        } else {
            $res     = sendResponse('false',
                        $data     = array(),
                        $message  = 'Data not found',
                        $code     = 404);
        }
        return $res;
    }

    /*GET A SINGLE COMPANY*/
    public function getCompany(Request $request)
    {
         $company = Company::find($request->id);
         if($company) {
            $res     = sendResponse('true',
                        $data     = $company,
                        $message  = 'Success',
                        $code     = 200);
        } else {
            $res     = sendResponse('false',
                        $data     = array(),
                        $message  = 'Data not found',
                        $code     = 404);
        }
        return $res;
    }
}
