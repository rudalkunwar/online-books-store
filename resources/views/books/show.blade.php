@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4 px-6">
        <h1 class="text-3xl font-bold text-gray-800">{{ $book->title }}</h1>
        <a href="{{ route('books.index') }}"
            class="bg-blue-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300 flex items-center space-x-2">
            <i class="ri-arrow-left-line text-lg"></i>
            <span class="font-semibold">Back to Books</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold text-gray-700 mb-2">Description</h2>
            <p class="text-gray-600">{{ $book->description }}</p>

            <h2 class="text-2xl font-semibold text-gray-700 mt-4 mb-2">Details</h2>
            <ul class="list-none mb-4">
                <li class="flex items-center mb-2">
                    <i class="ri-user-line text-lg text-gray-500 mr-2"></i>
                    <span><strong>Author:</strong> {{ $book->author?->name }}</span>
                </li>
                <li class="flex items-center mb-2">
                    <i class="ri-building-line text-lg text-gray-500 mr-2"></i>
                    <span><strong>Publication:</strong> {{ $book->publication?->name }}</span>
                </li>
                <li class="flex items-center mb-2">
                    <i class="ri-calendar-line text-lg text-gray-500 mr-2"></i>
                    <span><strong>Published Date:</strong> {{ $book->published_date }}</span>
                </li>
                <li class="flex items-center mb-2">
                    <i class="ri-money-dollar-box-line text-lg text-gray-500 mr-2"></i>
                    <span><strong>Price:</strong> Rs{{ $book->price }}</span>
                </li>
                <li class="flex items-center mb-2">
                    <i class="ri-bar-chart-horizontal-line text-lg text-gray-500 mr-2"></i>
                    <span><strong>Category:</strong> {{ $book->category?->name }}</span>
                </li>
            </ul>

            <h2 class="text-2xl font-semibold text-gray-700 mt-4 mb-2">Genres</h2>
            @if ($book->genres->isEmpty())
                <p class="text-gray-500">No Genres</p>
            @else
                <ul class="list-disc pl-5 text-gray-600">
                    @foreach ($book->genres as $genre)
                        <li>{{ $genre->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg">
            @if ($book->photo)
                <img src="{{ Storage::url($book->photo) }}" alt="{{ $book->title }}"
                    class="w-[350px] h-auto object-cover rounded-lg shadow-md">
            @else
                <p class="text-gray-500">No Photo</p>
            @endif
        </div>
    </div>
@endsection
