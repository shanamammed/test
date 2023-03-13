<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Company;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.company.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields     = $request->input();
        $this->validate($request, [
                                 'name'   => 'required|min:2|max:200',
                                 'email'  => 'required|email|unique:companies,email',
                                 'website'=> 'nullable',
                                 'logo'   => 'required|dimensions:width=100,height=100'
                                ],
                                [
                                  'email.email' => 'Please enter a valid email',
                                  'email.unique'=> 'The email should be unique',
                                  'logo.dimensions' => 'The logo should have width of 100 and height of 100'  
                                ]
                            );
            $company = new Company();
            $company->name = $fields['name'];
            $company->email= $fields['email'];
            $company->website = $fields['website'];
            if ($request->file('logo')!=null)
            {
                $image    = $request->file('logo');
                $file_name= time().'.'.$image->getClientOriginalExtension();
                $path= $image->storeAs('logos', $file_name);
                $company->logo= $path;
            }   
            $company->save();
            return redirect(route('company.index'))->with('message', 'Company created with success');
         
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
        $company = Company::find($id);
        return view("admin.company.edit", compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields     = $request->input();
        $this->validate($request, [
                                 'name'   => 'required|min:2|max:200',
                                 'email'  => 'required|email|unique:companies,email,'.$id,
                                 'website'=> 'nullable',
                                 'logo'   => 'nullable|dimensions:width=100,height=100'
                                ],
                                [
                                  'email.email' => 'Please enter a valid email',
                                  'email.unique'=> 'The email should be unique',
                                  'logo.dimensions' => 'The logo should have width of 100 and height of 100'  
                                ]
                            );
            $company = Company::find($id);
            $company->name = $fields['name'];
            $company->email= $fields['email'];
            $company->website = $fields['website'];
            if ($request->file('logo')!=null)
            {
                $image    = $request->file('logo');
                $file_name= time().'.'.$image->getClientOriginalExtension();
                $path= $image->storeAs('logos', $file_name);
                $company->logo= $path;
            }   
            $company->save();
            return redirect(route('company.index'))->with('message', 'Company updated with success');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Company::find($id)->delete();
        return redirect(route('company.index'))->with('message', 'Company deleted with success');
    }
}
