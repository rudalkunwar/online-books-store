<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rose Books Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"/>
</head>
<body>
    <header class="py-4 shadow-sm bg-pink-300">
        <div class="container flex items-center justify-between mx-auto px-4">
          <a href="index.html">
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

            <button id="toggle-button" class="lg:hidden ml-auto text-center text-gray-700 hover:text-blue-500 transition relative">
                <i class="ri-menu-fill ri-lg"></i>
            </button>
          </div>
     
        </div>
      </header>
      <!-- ./header -->

    <div id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-full bg-white z-50 hidden">
        <button id="close-button" class="absolute top-2 right-4 z-50">
            <i class="ri-close-fill ri-lg"></i>
        </button>
        <ul class="flex flex-col justify-center items-center h-full">
            <li class="py-3 border-b">
                <a href="#" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Home</a>
            </li>
            <li class="py-3 border-b">
                <a href="#" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Team</a>
            </li>
            <li class="py-3 border-b">
                <a href="#" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Feature</a>
            </li>
            <li class="py-3 border-b">
                <a href="#" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Blog</a>
            </li>
            <li class="py-3 border-b">
                <a href="#" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">About</a>
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

    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/029/861/640/small_2x/open-book-on-blue-background-back-to-school-concept-copy-space-generative-ai-photo.jpg');">
      <div class="container mx-auto px-4">
        <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
          Discover Your Next Favorite Book
        </h1>
        <p class="text-lg text-white/90">
          Explore a wide range of genres and find the perfect book for every mood and moment. <br>
          Dive into the world of literature and enrich your reading experience with our collection.
        </p>
        <div class="mt-12">
          <a href="#" class="bg-green-600 border border-green-600 text-white px-8 py-3 font-medium rounded-md hover:bg-transparent hover:bg-green-800 transition">Browse Now</a>
        </div>
      </div>
    </div>
   <!-- new arrival -->
   <div class="container mx-auto pb-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6 py-4 my-2">Top New Arrival</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @for ($i = 0; $i < 5; $i++)
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="https://placehold.co/600x400" alt="Book {{$i + 1}}" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-blue-500 flex items-center justify-center hover:bg-gray-800 transition"
                       title="View Book">
                        <i class="ri-search-line"></i>
                    </a>
                    <a href="#"
                       class="text-white text-lg w-9 h-8 rounded-full bg-blue-500 flex items-center justify-center hover:bg-gray-800 transition"
                       title="Add to Wishlist">
                        <i class="ri-heart-line"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-blue-500 transition">Book Title {{$i + 1}}</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-blue-500 font-semibold">Rs 20.00</p>
                </div>
            </div>
            <a href="#"
               class="block w-full py-1 text-center text-white bg-blue-500 border border-blue-500 rounded-b hover:bg-transparent hover:text-blue-500 transition">
                Add to Cart
            </a>
        </div>
        @endfor
    </div>
</div>

  </div>
  </div>



    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const toggleButton = document.getElementById('toggle-button');
        const closeButton = document.getElementById('close-button');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
        });

        closeButton.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    </script>
</body>
</html>