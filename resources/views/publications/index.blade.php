@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Publications</h1>
            <a href="{{ route('publications.create') }}" class="bg-green-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
                <i class="ri-add-line text-lg"></i>
                <span class="font-semibold">Add Publication</span>
            </a>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="border-b bg-gray-100 text-left">
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Contact</th>
                    <th class="px-6 py-3">Photo</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($publications as $publication)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $publication->name }}</td>
                        <td class="px-6 py-4">{{ $publication->address }}</td>
                        <td class="px-6 py-4">{{ $publication->contact }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($publication->photo)
                                <img src="{{ Storage::url($publication->photo) }}" alt="{{ $publication->title }}" class="w-16 h-16 object-cover">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('publications.edit', $publication->id) }}" class="bg-blue-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-blue-700 transition-colors duration-300">
                                Edit
                            </a>
                            <form action="{{ route('publications.destroy', $publication->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this publication?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg text-white shadow-lg hover:bg-red-700 transition-colors duration-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center">No publications found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
