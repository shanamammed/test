<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
          <a href="{{route('company.create')}}"><button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end" style="float: right;">Create Company</button></a><br>      
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  @if(Session::has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      {{Session::get('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 
                @endif              
                <div class="p-6 text-gray-900">

                    <table class="table table-striped">
                        <thead>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                         @forelse ($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td> 
                                    <a href="{{route('company.edit', [$company->id])}}" class="text-blue-500"><button class="btn-primary">Edit</button></a>
                                    <form method="post" action="{{route('company.destroy', [$company->id])}}" id="deleteForm{{$company->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500" onclick="event.preventDefault(); if(confirm('Are you sure to delete?')) {document.getElementById('deleteForm{{$company->id}}').submit();} else {return false;} ">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="px-6 py-4 whitespace-nowrap" style="text-align: center;">No companies to display</td></tr>
                        @endforelse    
                        </tbody>
                    </table>
                 <div class="d-flex justify-content-left">
                    {{ $companies->links('vendor.pagination.bootstrap-5') }}
                </div>
            <div class="my-3">
                {{$companies->links()}}
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
