<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="row mb-3"> 
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Companies</h6>
                                    <h2 class="display-4">{{$companies->count();}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-info text-white h-100">
                                <div class="card-body bg-info">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Employees</h6>
                                    <h2 class="display-4">{{$employees->count();}}</h2>
                                </div>
                            </div>
                        </div>
                     </div>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
