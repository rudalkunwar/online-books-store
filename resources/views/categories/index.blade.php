@extends('layouts.app')
@section('content')
<div class="pl-8 shadow-md container mx-auto flex justify-between items-center py-4">
    <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
    <a href="{{route('categories.create')}}" class="bg-green-500 px-5 py-2 rounded-lg text-white shadow-lg hover:bg-green-700 transition-colors duration-300 flex items-center space-x-2">
        <i class="ri-add-line text-lg"></i>
        <span class="font-semibold">Add Category</span>
    </a>
</div>
@endsection