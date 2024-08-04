@extends('layouts.app')

@section('content')
<div class="container mx-auto px-8 py-6">
    <div class="flex justify-between items-center mb-4 pb-2 shadow-md">
        <h1 class="text-3xl font-bold text-gray-800">Users</h1>
    </div>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white shadow-md rounded-lg p-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">SN</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Email Verified</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                    <td class="border px-4 py-2 text-center">
                        <form action="{{ route('profile.delete_user', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
