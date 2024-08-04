@extends('layouts.app')

@section('content')
    <div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800">Add Book</h1>
        <a href="{{ route('books.index') }}"
            class="bg-red-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Cancel</span>
        </a>
    </div>

    <div class="container mx-auto px-8 py-6">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Book Details</h2>

                <!-- Title Field -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title"
                        class="w-full px-4 py-2 border @error('title') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('title') }}" required>
                    @error('title')
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

                <!-- Author Field -->
                <div class="mb-4">
                    <label for="author_id" class="block text-gray-700 text-sm font-medium mb-2">Author</label>
                    <select id="author_id" name="author_id"
                        class="w-full px-4 py-2 border @error('author_id') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="" disabled selected>Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
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
                    <select id="publication_id" name="publication_id"
                        class="w-full px-4 py-2 border @error('publication_id') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="" disabled selected>Select Publication</option>
                        @foreach ($publications as $publication)
                            <option value="{{ $publication->id }}"
                                {{ old('publication_id') == $publication->id ? 'selected' : '' }}>
                                {{ $publication->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('publication_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Field -->
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-medium mb-2">Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border @error('category_id') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('categories')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Genres Field -->
                <div class="mb-6">
                    <label for="genres" class="block text-gray-700 text-sm font-medium mb-2">Genres</label>
                    <div class="flex flex-wrap bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                        @if (count($genres) == 0)
                            <div>No Genres to select</div>
                        @else
                            @foreach ($genres as $genre)
                                <div class="mr-4 mb-2 flex items-center">
                                    <input type="checkbox" id="genre-{{ $genre->id }}" name="genres[]"
                                        value="{{ $genre->id }}"
                                        {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}
                                        class="form-checkbox h-5 w-5 text-indigo-600 transition duration-150 ease-in-out">
                                    <label for="genre-{{ $genre->id }}"
                                        class="ml-2 text-gray-700">{{ $genre->name }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @error('genres')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Date Field -->
                <div class="mb-4">
                    <label for="published_date" class="block text-gray-700 text-sm font-medium mb-2">Published Date</label>
                    <input type="date" id="published_date" name="published_date"
                        class="w-full px-4 py-2 border @error('published_date') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('published_date') }}">
                    @error('published_date')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Field -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-medium mb-2">Photo</label>
                    <input type="file" id="photo" name="photo"
                        class="w-full px-4 py-2 border @error('photo') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('photo')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock Field -->
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 text-sm font-medium mb-2">Stock</label>
                    <input type="number" step="0.01" id="stock" name="stock"
                        class="w-full px-4 py-2 border @error('stock') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('stock') }}" required>
                    @error('stock')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Price Field -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-medium mb-2">Price</label>
                    <input type="number" step="0.01" id="price" name="price"
                        class="w-full px-4 py-2 border @error('price') border-red-500  @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ old('price') }}" required>
                    @error('price')
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
