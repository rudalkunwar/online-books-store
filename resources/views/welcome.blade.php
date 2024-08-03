@extends('layout.guest')
@section('content')
<section class="bg-white">
    <div class="grid py-8 px-4 mx-auto max-w-screen-xl lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="place-self-center mr-auto lg:col-span-7">
            <h1 class="mb-4 max-w-2xl text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl">Welcome to Rose Books Store</h1>
            <p class="mb-6 max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">Explore our vast collection of books and discover new authors and genres.</p>
            <a href="/register" class="bg-blue-700 inline-flex justify-center items-center py-3 px-5 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                Get started
                <i class="ri-arrow-right-line ml-2 -mr-1 w-5 h-5"></i>
            </a>
            <a href="/login" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                Login
                <i class="ri-login-box-line ml-2 -mr-1 w-5 h-5"></i>
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img class="w-64" src="" alt="bookshelf">
        </div>                
    </div>
</section>
@endsection