@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6 h-screen flex flex-col">
        <div class="flex justify-between items-center mb-4 pb-2 shadow-md">
            <h1 class="text-3xl font-bold text-gray-800">Edit Profile</h1>
        </div>
        <div class="flex-grow flex justify-center items-center">
            <div class="max-w-md w-full bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('profile.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="name" id="name" name="name" value="{{ $admin->name }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                        @error('name')
                            <h2 class="text-red-500">{{ $message }}</h2>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $admin->email }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                        @error('email')
                            <h2 class="text-red-500">{{ $message }}</h2>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection