@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Edit Publication</h1>
            <a href="{{ route('publications.index') }}" class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-arrow-left-line text-lg"></i>
                <span class="font-semibold">Back to List</span>
            </a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('publications.update', $publication->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border @error('name') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('name', $publication->name) }}" required>
                    @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address Field -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                    <input type="text" id="address" name="address" class="w-full px-4 py-2 border @error('address') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('address', $publication->address) }}" required>
                    @error('address')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Field -->
                <div class="mb-4">
                    <label for="contact" class="block text-gray-700 text-sm font-medium mb-2">Contact</label>
                    <input type="text" id="contact" name="contact" class="w-full px-4 py-2 border @error('contact') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('contact', $publication->contact) }}" required>
                    @error('contact')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Field -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-medium mb-2">Photo</label>
                    <input type="file" id="photo" name="photo" class="w-full px-4 py-2 border @error('photo') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @if($publication->photo)
                        <img src="{{ Storage::url($publication->photo) }}" alt="Current Photo" class="mt-2 w-24 h-24 object-cover">
                    @endif
                    @error('photo')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 px-6 py-2 w-full rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
