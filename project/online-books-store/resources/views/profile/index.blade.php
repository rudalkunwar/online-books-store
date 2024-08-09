@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center mb-4 pb-2 shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 ml-5">Profile</h1>
        </div>
        <div class="h-[69vh] flex justify-center items-center ">
            <div class="max-w-sm w-full bg-white shadow-md rounded-lg p-6">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('storage/images/image.png') }}" alt="Admin">
                    <h3 class="text-xl font-medium text-gray-700 mb-2">{{ $admin->name }}</h3>
                    <p class="text-gray-500 mb-4">{{ $admin->email }}</p>
                    <a class="bg-green-400 px-6 py-2 rounded-md hover:bg-green-500" href="{{route('profile.edit')}}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
