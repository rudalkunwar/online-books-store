@extends('layouts.app')
@section('content')
<div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
    <h1 class="text-3xl font-bold text-gray-800">Edit Author</h1>
    <a href="{{ route('authors.index') }}" class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
        <i class="ri-arrow-left-line text-lg"></i>
        <span class="font-semibold">Cancel</span>
    </a>
</div>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Author</h1>

    <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bio" class="block text-gray-700 font-bold mb-2">Bio</label>
            <textarea name="bio" id="bio" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio', $author->bio) }}</textarea>
            @error('bio')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="birth_date" class="block text-gray-700 font-bold mb-2">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $author->birth_date) }}" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('birth_date')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo</label>
            @if ($author->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $author->photo) }}" alt="{{ $author->name }}" class="w-16 h-16 rounded object-cover">
                </div>
            @endif
            <input type="file" name="photo" id="photo" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('photo')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-5 py-2 w-full rounded-lg shadow-lg hover:bg-blue-700 transition-colors duration-300">Update Author</button>
        </div>
    </form>
</div>
@endsection