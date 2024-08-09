@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Authors</h1>
            <a href="{{ route('authors.create') }}" class="bg-green-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add Author</span>
            </a>
        </div>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-4 border-b text-left text-gray-600">SN</th>
                        <th class="py-3 px-4 border-b text-left text-gray-600">Name</th>
                        <th class="py-3 px-4 border-b text-left text-gray-600">Bio</th>
                        <th class="py-3 px-4 border-b text-left text-gray-600">Birth Date</th>
                        <th class="py-3 px-4 border-b text-left text-gray-600">Photo</th>
                        <th class="py-3 px-4 border-b text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1
                    @endphp
                    @forelse ($authors as $author)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b text-gray-800">{{ $i++ }}</td>
                            <td class="py-3 px-4 border-b text-gray-800">{{ $author->name }}</td>
                            <td class="py-3 px-4 border-b text-gray-800">{{ $author->bio }}</td>
                            <td class="py-3 px-4 border-b text-gray-800">{{ $author->birth_date }}</td>
                            <td class="py-3 px-4 border-b">
                                @if ($author->photo)
                                    <img src="{{ Storage::url($author->photo) }}" alt="{{ $author->name }}" class="w-16 h-16 rounded object-cover">
                                @else
                                    <span class="text-gray-500">No Photo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 border-b">
                                <a href="{{ route('authors.edit', $author->id) }}" class="px-4 py-2 rounded-md text-white bg-blue-600  hover:bg-blue-900 mr-2">Edit</a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 rounded-md text-white bg-red-600  hover:bg-red-900 mr-2" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-3 px-4 border-b text-center text-gray-500">No authors found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
