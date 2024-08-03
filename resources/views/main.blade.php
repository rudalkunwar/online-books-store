<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rose Books Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
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
                <a href="#about" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">About</a>
            </li>
            <li class="py-3 border-b">
                <a href="#contact" class="text-gray-500 hover:text-blue-500 font-semibold text-sm">Contact</a>
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
                    @foreach ($categories as $item)
                        <a href="category/{{ $item->id }}"
                            class="flex items-center px-4 py-2 hover:bg-gray-100 transition">
                            <span class="ml-3 text-gray-600 text-sm">{{ $item->name }}</span>
                        </a>
                    @endforeach
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
                <a href="#about" class="text-gray-200 hover:text-white transition flex items-center">
                    <i class="ri-information-line text-gray-200 mr-2"></i>
                    About Us
                </a>
                <a href="#contact" class="text-gray-200 hover:text-white transition flex items-center">
                    <i class="ri-mail-line text-gray-200 mr-2"></i>
                    Contact Us
                </a>
            </div>
            <!-- Login and Register buttons -->
            <div class="flex items-center space-x-4">
                <a href="pages/login.html"
                    class="text-gray-200 hover:text-white transition text-base flex items-center">
                    <i class="ri-login-box-line text-gray-200 mr-2"></i>
                    <span class="hidden md:flex">Login</span>
                </a>
                <a href="pages/register.html"
                    class="text-gray-200 hover:text-white transition text-base flex items-center">
                    <i class="ri-user-add-line text-gray-200 mr-2"></i>
                    <span class="hidden md:flex">Register</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- ./navbar -->
    <div class="bg-cover bg-no-repeat bg-center h-screen flex items-center"
        style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/029/861/640/small_2x/open-book-on-blue-background-back-to-school-concept-copy-space-generative-ai-photo.jpg');">
        <div class="container mx-auto px-4">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                Discover Your Next Favorite Book
            </h1>
            <p class="text-lg text-white/90">
                Explore a wide range of genres and find the perfect book for every mood and moment. <br>
                Dive into the world of literature and enrich your reading experience with our collection.
            </p>
            <div class="mt-12">
                <a href="#"
                    class="bg-green-600 border border-green-600 text-white px-8 py-3 font-medium rounded-md hover:bg-transparent hover:bg-green-800 transition">Browse
                    Now</a>
            </div>
        </div>
    </div>
    <!-- new arrival -->
    <div class="container mx-auto pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6 py-4 my-2 text-center">Top New Arrival</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($books as $book)
                <div class="bg-white shadow rounded overflow-hidden group mx-6 md:mx-2">
                    <div class="relative">
                        <img src="{{ Storage::url($book->photo) }}" alt="" class="w-full">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-blue-500 flex items-center justify-center hover:bg-gray-800 transition"
                                title="Add to Wishlist">
                                <i class="ri-heart-line"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4
                                class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-blue-500 transition">
                                {{ $book->title }}</h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-blue-500 font-semibold">Rs {{ $book->price }}</p>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-white bg-blue-500 border border-blue-500 rounded-b hover:bg-blue-600 transition">
                        Add to Cart
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- contact us  -->
    <section id="contact" class="py-36 bg-gray-300 z-40">
        <div class="h-screen">
            <div class="flex flex-col items-center h-full justify-center px-4 md:px-0">
                <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6 my-2 text-center">Contact Us</h2>

                <div class="flex flex-col md:flex-row-reverse rounded-lg w-full md:w-3/4 lg:w-10/12 md:mx-0">
                    <div class="md:w-1/2 md:h-full flex items-center justify-center">
                        <div class="w-full flex flex-col text-center rounded-lg p-6 md:p-10">
                            <div class="w-full mx-auto mb-6 flex">
                                <div class="w-1/2">
                                    <i class="text-3xl md:text-5xl ri-map-pin-line"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-2xl font-bold">Our Location</h4>
                                    <p class="text-gray-600">Bharatpur, Chitwan, Nepal</p>
                                </div>
                            </div>
                            <div class="w-full mx-auto mb-6 flex">
                                <div class="w-1/2">
                                    <i class="text-3xl md:text-5xl ri-phone-line"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-2xl font-bold">Call Us</h4>
                                    <p class="text-gray-600">+977 056 527237</p>
                                </div>
                            </div>
                            <div class="w-full mx-auto flex">
                                <div class="w-1/2">
                                    <i class="text-3xl md:text-5xl ri-mail-line"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-2xl font-bold">Email Us</h4>
                                    <p class="text-gray-600">info@gcs.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-1/2 p-4">
                        <div class="flex flex-col flex-1 justify-center mb-8">
                            <div class="mb-4">
                                <h6 class="text-gray-600 uppercase font-bold mb-2">Need Help?</h6>
                                <h1 class="text-4xl font-bold">Send Us A Message</h1>
                            </div>
                            <div class="w-full mt-4">
                                <form class="form-horizontal mx-auto" method="POST" action="">
                                    <div class="mb-6">
                                        <input type="text"
                                            class="w-full shadow-md border-1 border-gray-400 rounded-md py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500 bg-white-100"
                                            placeholder="Your Name" name="name" required="required">
                                    </div>
                                    <div class="mb-6">
                                        <input type="email"
                                            class="w-full shadow-md border-1 border-gray-400 rounded-md py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500"
                                            placeholder="Your Email" name="email" required="required">
                                    </div>
                                    <div class="mb-6">
                                        <textarea
                                            class="w-full shadow-md border-1 border-gray-400 rounded-md py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500"
                                            rows="5" placeholder="Message" name="message" required="required"></textarea>
                                    </div>
                                    <div class="w-full text-center">
                                        <input type="submit" name="submit"
                                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-md">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="py-36 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Image on the left -->
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="https://www.shutterstock.com/image-vector/technical-support-call-center-contact-600nw-247361338.jpg"
                        alt="About Us" class="rounded-lg shadow-lg">
                </div>

                <!-- Text content on the right -->
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">About Us</h2>
                    <p class="text-gray-600 mb-6">
                        We are a team of passionate individuals dedicated to providing the best service to our
                        customers. Our company was founded with the goal of making a positive impact in our industry by
                        offering innovative solutions and exceptional customer service.
                    </p>
                    <p class="text-gray-600 mb-6">
                        With years of experience and a commitment to excellence, we strive to exceed expectations and
                        build lasting relationships with our clients. Our team is composed of experts in various fields,
                        all working together to achieve our common goals and deliver outstanding results.
                    </p>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h3>
                    <p class="text-gray-600 mb-6">
                        Our mission is to revolutionize the industry by continuously improving our products and
                        services. We aim to create value for our customers through innovation, quality, and integrity.
                    </p>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Values</h3>
                    <ul class="list-disc pl-5 text-gray-600">
                        <li class="mb-2">Integrity: We uphold the highest standards of integrity in all our actions.
                        </li>
                        <li class="mb-2">Innovation: We embrace innovation and strive for continuous improvement.
                        </li>
                        <li class="mb-2">Customer Focus: We are dedicated to meeting the needs of our customers.</li>
                        <li class="mb-2">Excellence: We are committed to delivering excellence in everything we do.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Meet Our Team</h2>
            <div class="flex gap-8 justify-center items-center flex-col md:flex-row">
                <!-- Team Member 1 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg md:w-[30%] ">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s"
                        alt="Team Member 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 text-center">John Doe</h3>
                    <p class="text-gray-600 text-center">CEO & Founder</p>
                    <p class="text-gray-600 mt-2">
                        John has over 20 years of experience in the industry and leads our team with vision and passion.
                    </p>
                </div>
                <!-- Team Member 2 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg md:w-[30%]">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s"
                        alt="Team Member 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 text-center">Jane Smith</h3>
                    <p class="text-gray-600 text-center">Chief Operating Officer</p>
                    <p class="text-gray-600 mt-2">
                        Jane ensures our operations run smoothly and efficiently, bringing years of operational
                        expertise.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="bg-gray-100 pt-8 pb-4 border-t border-gray-200 mx-6 md:mx-2">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="col-span-1 space-y-4">
                <img src="assets/images/logo.svg" alt="logo" class="w-30">
                <p class="text-gray-600">
                    Discover a wide range of books and enrich your reading experience.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-gray-700"><i
                            class=" text-3xl ri-facebook-circle-fill"></i></a>
                    <a href="#" class="text-gray-500 hover:text-gray-700"><i
                            class=" text-3xl ri-instagram-fill"></i></a>
                    <a href="#" class="text-gray-500 hover:text-gray-700"><i
                            class=" text-3xl ri-twitter-fill"></i></a>
                    <a href="#" class="text-gray-500 hover:text-gray-700"><i
                            class=" text-3xl ri-github-fill"></i></a>
                </div>
            </div>
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Popular Authors</h3>
                <div class="mt-4 space-y-2 w-5/12">
                    <a href="#" class="text-base text-gray-600 hover:text-gray-800 block ">J.K. Rowling</a>
                    <a href="#" class="text-base text-gray-600 hover:text-gray-800 block">Stephen King</a>
                </div>
            </div>
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Popular Category</h3>
                <div class="mt-4 space-y-2 w-5/12">
                    @for ($i = 0; $i < 3; $i++)
                        <a href="category/{{ $categories[$i]->id }}"
                            class="text-base text-gray-600 hover:text-gray-800 block">{{ $categories[$i]->name }}</a>
                    @endfor
                </div>
            </div>
        </div>
    </footer>
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
