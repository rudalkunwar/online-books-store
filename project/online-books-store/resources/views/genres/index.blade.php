@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center mb-4 pb-2 shadow-md">
            <h1 class="text-3xl font-bold text-gray-800">Genre</h1>
            <a href="{{ route('genres.create') }}"
                class="bg-green-500 px-4 py-2 rounded-lg text-white  hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add Genre</span>
            </a>
        </div>
        <div class="">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="border-b bg-gray-100 text-left">
                        <th class="px-6 py-3">SN</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse($genres as $genre)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $i++ }}</td>
                            <td class="px-6 py-4">{{ $genre->name }}</td>
                            <td class="px-6 py-4">{{ $genre->description }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('genres.edit', $genre->id) }}"
                                    class="bg-blue-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this genre?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center">No Genres found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
