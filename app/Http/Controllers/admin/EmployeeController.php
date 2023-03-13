<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Company;
use App\Models\admin\Employee;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view("admin.employee.add", compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields     = $request->input();
        $this->validate($request, [
                                 'first_name'   => 'required|min:2|max:200',
                                 'last_name'   => 'required|max:200',
                                 'mobile'  => 'required|numeric|unique:employees,mobile',
                                 'email'  => 'nullable|email|unique:employees,email',
                                 'company_id'=> 'required|numeric',
                                ],
                                [
                                  'email.email' => 'Please enter a valid email',
                                  'email.unique'=> 'The email should be unique',
                                  'mobile.unique' => 'The mobile number already registered.'
                                ]);
        $employee = new Employee();
        $employee->first_name = $fields['first_name'];
        $employee->last_name  = $fields['last_name'];
        $employee->email  = $fields['email'];
        $employee->mobile = $fields['mobile'];
        $employee->gender = $fields['gender'];
        $employee->company_id = $fields['company_id'];
        $employee->save();
        return redirect(route('employee.index'))->with('message', 'Employee created with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::all();
        $employee= Employee::find($id);
        return view("admin.employee.edit", compact('companies','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields     = $request->input();
        $this->validate($request, [
                                 'first_name'   => 'required|min:2|max:200',
                                 'last_name'   => 'required|max:200',
                                 'mobile'  => 'required|numeric|unique:employees,mobile,'.$id,
                                 'email'  => 'nullable|email|unique:employees,email,'.$id,
                                 'company_id'=> 'required|numeric',
                                ],
                                [
                                  'email.email' => 'Please enter a valid email',
                                  'email.unique'=> 'The email should be unique',
                                  'mobile.unique' => 'The mobile number already registered.'
                                ]);
        $employee = Employee::find($id);
        $employee->first_name = $fields['first_name'];
        $employee->last_name  = $fields['last_name'];
        $employee->email  = $fields['email'];
        $employee->mobile = $fields['mobile'];
        $employee->gender = $fields['gender'];
        $employee->company_id = $fields['company_id'];
        $employee->status  = $fields['status'];
        $employee->save();
        return redirect(route('employee.index'))->with('message', 'Employee updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return redirect(route('employee.index'))->with('message', 'Employee deleted with success');
    }
}
