@include('user.header')
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

@include('user.footer')