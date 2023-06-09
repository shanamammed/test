<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12 px-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Company Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                             @error('name')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            @error('email')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="mt-4">
                            <x-input-label for="website" :value="__('Website')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" />
                            @error('website')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="mt-4">
                            <x-input-label for="logo" :value="__('Company Logo')" />
                            <input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" accept="image/*" required />
                            @error('logo')
                                <div class="text-red-600">{{$message}}</div>
                             @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Add Company') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
