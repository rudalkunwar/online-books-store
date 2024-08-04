@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Books</h1>
            <a href="{{ route('books.create') }}" class="bg-green-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add Book</span>
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">SN</th>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Author</th>
                        <th class="py-2 px-4 border-b">Publication</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                        <th  class="py-2 px-4 border-b">More</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $i=1
                    @endphp
                    @forelse ($books as $book)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $i++ }}</td>
                            <td class="py-2 px-4 border-b">{{ $book->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $book->author?->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $book->publication?->name }}</td>
                            <td class="py-2 px-4 border-b">Rs {{ $book->price }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('books.edit', $book->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg shadow hover:bg-blue-700 transition-colors duration-300">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg shadow hover:bg-red-700 transition-colors duration-300" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            <td  class="py-2 px-4 border-b text-green-400"><a href="{{route('books.show',$book->id)}}">More</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-2 px-4 border-b text-center">No books found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
