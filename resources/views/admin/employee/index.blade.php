<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
          <a href="{{route('employee.create')}}"><button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end" style="float: right;">Create Employeee</button></a><br>      
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{Session::get('message')}}
                      <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>
                 
                @endif              
                <div class="p-6 text-gray-900">

                    <table class="table table-striped">
                        <thead>
                            <th>Employee Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                         @forelse ($employees as $employee)
                            <tr>
                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                <td>{{$employee->mobile}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>@if($employee->status=='1') Active @elseif($employee->status=='2') Resigned @else Suspended @endif</td>
                                <td> 
                                    <a href="{{route('employee.edit', [$employee->id])}}" class="text-blue-500"><button class="btn btn-primary">Edit</button></a>
                                    <form method="post" action="{{route('employee.destroy', [$employee->id])}}" id="deleteForm{{$employee->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500" onclick="event.preventDefault(); if(confirm('Are you sure to delete?')) {document.getElementById('deleteForm{{$employee->id}}').submit();} else {return false;} ">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="px-6 py-4 whitespace-nowrap" style="text-align: center;">No employees to display</td></tr>
                        @endforelse    
                        </tbody>
                    </table>
                 <div class="d-flex justify-content-left">
                    {{ $employees->links('vendor.pagination.bootstrap-5') }}
                </div>
            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
