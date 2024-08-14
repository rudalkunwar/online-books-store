<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rose Books Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script></script>
</head>

<body>
    <header class="py-4 shadow-sm bg-gray-400 sticky top-0 z-20">
        <div class="container flex items-center justify-between mx-auto px-4">
            <a href="{{ route('index') }}">
                <h2>Rose Books Shop</h2>
            </a>
            <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="ri-search-line hidden md:flex"></i>
                </span>
                <input type="text" name="search" id="search"
                    class="w-full border border-blue-500 border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                    placeholder="Search">
                <button
                    class="bg-blue-500 border border-blue-500 text-white px-8 rounded-r-md hover:bg-transparent hover:text-blue-500 transition hidden md:flex justify-center items-center">Search</button>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-center text-gray-700 hover:text-blue-500 transition relative">
                    <div class="text-2xl">
                        <i class="ri-heart-line"></i>
                    </div>
                    <div class="text-xs leading-3">Wishlist</div>
                    <div
                        class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-blue-500 text-white text-xs">
                        8</div>
                </a>
                <a href="#" class="text-center text-gray-700 hover:text-blue-500 transition relative">
                    <div class="text-2xl">
                        <i class="ri-shopping-bag-line"></i>
                    </div>
                    <div class="text-xs leading-3">Cart</div>
                    <div
                        class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-blue-500 text-white text-xs">
                        2</div>
                </a>
                <a href="#" class="text-center text-gray-700 hover:text-blue-500 transition relative">
                    <div class="text-2xl">
                        <i class="ri-user-line"></i>
                    </div>
                    <div class="text-xs leading-3">Account</div>
                </a>

            </div>
            <button id="toggle-button"
                class="lg:hidden ml-auto px-6 text-center text-gray-700 hover:text-blue-500 transition relative">
                <i class="ri-menu-fill ri-lg"></i>
            </button>
        </div>
    </header>
    <!-- ./header -->
    <!-- Mobile Menue -->
    <div id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-full bg-white z-50 hidden">
        <button id="close-button" class="absolute top-2 right-4 z-50">
            <i class="ri-close-fill ri-lg"></i>
        </button>
        <ul class="flex flex-col justify-center items-center h-full">
            <li class="py-3 border-b">
                <a href="{{ route('index') }}" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Home</a>
            </li>
            <li class="py-3 border-b">
                <a href="#about" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Wishlist</a>
            </li>
            <li class="py-3 border-b">
                <a href="#about" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Cart</a>
            </li>
            <li class="py-3 border-b">
                <a href="{{ route('about') }}" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">About</a>
            </li>
            <li class="py-3 border-b">
                <a href="{{ route('contact') }}"
                    class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Contact</a>
            </li>
            <li class="py-3 border-b mx-10">
                <div class="w-full max-w-1/2 relative flex">
                    <span class="absolute left-4 top-3 text-lg text-gray-400">
                        <i class="ri-search-line"></i>
                    </span>
                    <input type="text" name="search" id="search"
                        class="w-full border border-blue-500 border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none flex"
                        placeholder="Search">
                    <button
                        class="w-1/2 bg-blue-500 border border-blue-500 text-white px-2 rounded-r-md hover:bg-transparent hover:text-blue-500 transition flex justify-center items-center">Search</button>
                </div>
            </li>
        </ul>
    </div>

    <!-- navbar -->
    <nav class="bg-gray-800 fixed w-full z-20">
        <div class="container mx-auto flex items-center justify-between px-4 py-4">
            <!-- Mobile menu button -->
            <div class="flex items-center cursor-pointer relative group">
                <span class="text-white text-lg">
                    <i class="ri-menu-line"></i>
                </span>
                <span class="ml-2 text-white text-base">Categories</span>

                <!-- Dropdown for mobile -->
                <div
                    class="absolute left-0 top-full w-48 bg-white shadow-lg py-2 divide-y divide-gray-200 opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    {{-- @foreach ($categories as $item)
                        <a href="category/{{ $item->id }}"
                            class="flex items-center px-4 py-2 hover:bg-gray-100 transition">
                            <span class="ml-3 text-gray-600 text-sm">{{ $item->name }}</span>
                        </a>
                    @endforeach --}}
                    <a href="">Test</a>
                </div>
            </div>
            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-6 capitalize">
                <a href="{{ route('index') }}" class="text-gray-200 hover:text-white transition flex items-center">
                    <i class="ri-home-line text-gray-200 mr-2"></i>
                    Home
                </a>
                <a href="pages/shop.html" class="text-gray-200 hover:text-white transition flex items-center">
                    <i class="ri-shopping-bag-line text-gray-200 mr-2"></i>
                    Shop
                </a>
                <a href="{{ route('about') }}" class="text-gray-200 hover:text-white transition flex items-center">
                    <i class="ri-information-line text-gray-200 mr-2"></i>
                    About Us
                </a>
                <a href="{{ route('contact') }}" class="text-gray-200 hover:text-white transition flex items-center">
                    <i class="ri-mail-line text-gray-200 mr-2"></i>
                    Contact Us
                </a>
            </div>

            @if (!$user)
                <div class="flex items-center space-x-4">
                    <a href="{{ route('register') }}"
                        class="text-gray-200 hover:text-white transition text-base flex items-center">
                        <i class="ri-user-add-line text-gray-200 mr-2"></i>
                        <span class="hidden md:flex">Register</span>
                    </a>
                    <span class="text-white px-1">|</span>
                    <a href="{{ route('login') }}"
                        class="text-gray-200 hover:text-white transition text-base flex items-center">
                        <i class="ri-login-box-line text-gray-200 mr-2"></i>
                        <span class="hidden md:flex">Login</span>
                    </a>
                </div>
            @endif
        </div>
    </nav>
