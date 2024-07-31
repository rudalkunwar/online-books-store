@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Book</h1>
            <a href="{{ route('books.index') }}" class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-arrow-left-line text-lg"></i>
                <span class="font-semibold">Cancel</span>
            </a>
        </div>

        <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-2 border @error('title') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('title', $book->title) }}" required>
                    @error('title')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author Field -->
                <div class="mb-4">
                    <label for="author_id" class="block text-gray-700 text-sm font-medium mb-2">Author</label>
                    <select id="author_id" name="author_id" class="w-full px-4 py-2 border @error('author_id') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="" disabled>Select Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Publication Field -->
                <div class="mb-4">
                    <label for="publication_id" class="block text-gray-700 text-sm font-medium mb-2">Publication</label>
                    <select id="publication_id" name="publication_id" class="w-full px-4 py-2 border @error('publication_id') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="" disabled>Select Publication</option>
                        @foreach($publications as $publication)
                            <option value="{{ $publication->id }}" {{ old('publication_id', $book->publication_id) == $publication->id ? 'selected' : '' }}>
                                {{ $publication->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('publication_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description</label>
                    <textarea id="description" name="description" class="w-full px-4 py-2 border @error('description') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price Field -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-medium mb-2">Price</label>
                    <input type="number" step="0.01" id="price" name="price" class="w-full px-4 py-2 border @error('price') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('price', $book->price) }}" required>
                    @error('price')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categories Field -->
                <div class="mb-6">
                    <label for="categories" class="block text-gray-700 text-sm font-medium mb-2">Categories</label>
                    <div class="flex flex-wrap bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                        @foreach($categories as $category)
                            <div class="mr-4 mb-2 flex items-center">
                                <input 
                                    type="checkbox" 
                                    id="category-{{ $category->id }}" 
                                    name="categories[]" 
                                    value="{{ $category->id }}" 
                                    {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray())) ? 'checked' : '' }}
                                    class="form-checkbox h-5 w-5 text-indigo-600 transition duration-150 ease-in-out"
                                >
                                <label for="category-{{ $category->id }}" class="ml-2 text-gray-700">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('categories')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Field -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-medium mb-2">Photo</label>
                    <input type="file" id="photo" name="photo" class="w-full px-4 py-2 border @error('photo') border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @if($book->photo)
                        <img src="{{ Storage::url($book->photo) }}" alt="Book Photo" class="mt-2 max-w-xs">
                    @endif
                    @error('photo')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                      Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
