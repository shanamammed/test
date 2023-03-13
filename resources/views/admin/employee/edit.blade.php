<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Employee') }}
        </h2>
    </x-slot>

    <div class="py-12 px-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{route('employee.update',[$employee->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{$employee->first_name}}" required />
                             @error('first_name')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{$employee->last_name}}" required />
                             @error('last_name')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>
                        
                        <div class="mt-4">
                            <x-input-label for="mobile" :value="__('Mobile Number')" />
                            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" value="{{$employee->mobile}}" required />
                            @error('mobile')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$employee->email}}" />
                            @error('email')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="mt-4">                    
                            <x-input-label for="company" :value="__('Company')" />
                            <select name="company_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{$employee->company_id==$company->id ? 'selected':''}}>
                                    {!! $company->name !!}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">                    
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select name="gender" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                               <option value="1" {{$employee->gender=='1' ? 'selected':''}}>Male</option>
                               <option value="2" {{$employee->gender=='2' ? 'selected':''}}>Female</option>
                               <option value="3" {{$employee->gender=='3' ? 'selected':''}}>Others</option>
                            </select>
                        </div>

                        <div class="mt-4">                    
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                               <option value="1" {{$employee->status=='1' ? 'selected':''}}>Active</option>
                               <option value="2" {{$employee->status=='2' ? 'selected':''}}>Resigned</option>
                               <option value="3" {{$employee->status=='3' ? 'selected':''}}>Suspended</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Employee') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
