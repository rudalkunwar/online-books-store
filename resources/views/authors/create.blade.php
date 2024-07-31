@extends('layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Add Author</h1>
        <a href="{{ route('authors.index') }}" class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>

    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Author Details</h2>

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bio Field -->
                <div class="mb-4">
                    <label for="bio" class="block text-gray-700 text-sm font-medium mb-2">Bio</label>
                    <textarea id="bio" name="bio" rows="4" class="w-full px-4 py-2 border @error('bio') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Birth Date Field -->
                <div class="mb-4">
                    <label for="birth_date" class="block text-gray-700 text-sm font-medium mb-2">Birth Date</label>
                    <input type="date" id="birth_date" name="birth_date" class="w-full px-4 py-2 border @error('birth_date') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_date') }}" required>
                    @error('birth_date')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Field -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-medium mb-2">Photo</label>
                    <input type="file" id="photo" name="photo" class="w-full px-4 py-2 border @error('photo') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('photo')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 px-6 py-2 w-full rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
