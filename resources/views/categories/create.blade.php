@extends('layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Add Category</h1>
        <a href="{{ route('categories.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>

    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Category Details</h2>
                <!-- Priority Field -->
                <div class="mb-4">
                    <label for="priority" class="block text-gray-700 text-sm font-medium mb-2">Priority</label>
                    <input type="text" id="priority" name="priority"
                        class="w-full px-4 py-2 border @error('priority') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('priority') }}" required>
                    @error('priority')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border @error('name') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-2 border @error('description') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-green-500 px-6 py-2 w-full rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
