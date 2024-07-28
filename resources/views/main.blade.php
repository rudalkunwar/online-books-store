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
    <header class="flex justify-between items-center py-4 px-4 sm:px-10 bg-violet-900 border-b sticky top-0">
        <a href="#" class="w-36">
            {{-- <img src="https://readymadeui.com/readymadeui.svg" alt="logo" /> --}}
            <h2 class="text-white">Rose Books Store</h2>
        </a>
        <nav class="hidden lg:flex lg:ml-14 lg:gap-x-5">
            <a href="#" class="text-gray-200 hover:text-blue-500 font-semibold text-sm">Home</a>
            <a href="#" class="text-gray-200 hover:text-blue-500 font-semibold text-sm">Books</a>
            <a href="#" class="text-gray-200 hover:text-blue-500 font-semibold text-sm">Feature</a>
            <a href="#" class="text-gray-200 hover:text-blue-500 font-semibold text-sm">Blog</a>
            <a href="#" class="text-gray-200 hover:text-blue-500 font-semibold text-sm">About</a>
        </nav>
        <div class="lg:ml-auto max-lg:w-full hidden lg:flex">
            <div class="flex items-center xl:w-80 max-xl:w-full bg-gray-100 px-4 py-2 rounded-lg">
                <input type="text" placeholder="Search something..." class="w-full rounded-lg text-sm bg-transparent border-none focus:outline-none placeholder-gray-500" />
                <i class="ri-search-line ri-lg cursor-pointer text-gray-400 mx-2"></i>
            </div>
        </div>
        <button id="toggle-button" class="lg:hidden ml-auto">
            <i class="ri-menu-fill ri-lg"></i>
        </button>
    </header>
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
        </ul>
    </div>

    @yield('content')

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