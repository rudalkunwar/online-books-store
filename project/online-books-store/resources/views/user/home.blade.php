@include('user.header')
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
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-blue-500 transition">
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
@include('user.footer')
