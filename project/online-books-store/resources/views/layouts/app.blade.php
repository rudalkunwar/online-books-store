<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .active {
            background-color: #e2e8f0;
            color: #1f2937;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex antialiased bg-gray-50 text-gray-800">
        <div class="flex flex-col fixed top-0 left-0 w-64 bg-white h-full border-r">
            <div class="flex items-center justify-center h-16 border-b">
                <div class="text-red-500 text-3xl py-2">Lost Books</div>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('dashboard.*') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-home-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-mail-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Inbox</span>
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-chat-3-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Comments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-notification-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                        </a>
                    </li>
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Tasks</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('books.*') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-book-2-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Books</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('categories.*') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-menu-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('genres.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('genres.*') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-edit-box-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Genres</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('authors.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('authors.*') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-user-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Authors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('publications.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('publications.*') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-folder-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Publications</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.users') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('profile.users') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-team-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Users</span>
                        </a>
                    </li>
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('profile.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none {{ request()->routeIs('profile.index') ? 'active border-l-4 border-indigo-500' : 'hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="ri-user-settings-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                    <i class="ri-logout-box-line w-5 h-5"></i>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-grow flex flex-col">
            <div class="flex-grow p-6">
                <div class="flex-1 ml-56 overflow-hidden pl-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @php
        session_start();
    @endphp

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sessionMessage = '<?php echo session('success') ? session('success') : ''; ?>';
            if (sessionMessage) {
                Toastify({
                    text: sessionMessage,
                    duration: 4000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    stopOnFocus: true,
                }).showToast();
            }
        });
    </script>
</body>

</html>
