@include('user.header')
<section id="contact" class="bg-gray-300 z-40">
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
@include('user.footer')