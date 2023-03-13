<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Company;
use App\Models\admin\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::all();
        return view('dashboard',compact('companies','employees'));
    }
    
}
