@extends('main')
@section('top-header')
<section class="bg-white">
<!-- header -->
<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between mx-auto px-4">
      <a href="index.html">
       <h2>Rose Books Shop</h2>
      </a>
  
      <div class="w-full max-w-xl relative flex">
        <span class="absolute left-4 top-3 text-lg text-gray-400">
          <i class="ri-search-line"></i>
        </span>
        <input type="text" name="search" id="search"
          class="w-full border border-blue-500 border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
          placeholder="Search">
        <button
          class="bg-blue-500 border border-blue-500 text-white px-8 rounded-r-md hover:bg-transparent hover:text-blue-500 transition hidden md:flex justify-center items-center">Search</button>
      </div>
  
      <div class="flex items-center space-x-6">
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
      <button id="toggle-button" class="lg:hidden ml-auto">
        <i class="ri-menu-fill ri-lg"></i>
    </button>
    </div>
  </header>
  <!-- ./header -->
  
</section>
@endsection