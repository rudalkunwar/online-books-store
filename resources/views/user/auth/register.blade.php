@include('user.header')
<!-- login -->
<div class="contain py-16">
    <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden bg-white">
       <div class="text-center">
        <h2 class="text-2xl uppercase font-medium mb-1">Create an account</h2>
        <p class="text-gray-600 mb-6 text-sm">Register as a new customer</p>
       </div>
        <form action="#" method="post" autocomplete="off">
            <div class="space-y-4">
                <div>
                    <label for="name" class="text-gray-600 mb-2 block">Full Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-gray-500 placeholder-gray-400"
                        placeholder="John Doe">
                </div>
                <div>
                    <label for="email" class="text-gray-600 mb-2 block">Email address</label>
                    <input type="email" name="email" id="email"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-gray-500 placeholder-gray-400"
                        placeholder="youremail@domain.com">
                </div>
                <div>
                    <label for="password" class="text-gray-600 mb-2 block">Password</label>
                    <input type="password" name="password" id="password"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-gray-500 placeholder-gray-400"
                        placeholder="*******">
                </div>
                <div>
                    <label for="confirm" class="text-gray-600 mb-2 block">Confirm password</label>
                    <input type="password" name="confirm" id="confirm"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-gray-500 placeholder-gray-400"
                        placeholder="*******">
                </div>
            </div>
            <div class="mt-6">
                <div class="flex items-center">
                    <input type="checkbox" name="agreement" id="agreement"
                        class="text-gray-600 focus:ring-0 rounded-sm cursor-pointer">
                    <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">I have read and agree to the terms
                        & conditions</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="block w-full py-2 text-center text-white bg-gray-800 border border-gray-800 rounded hover:bg-transparent hover:text-gray-800 transition uppercase font-medium">Create
                    Account</button>
            </div>
        </form>
        <p class="mt-4 text-center text-gray-600">Already have an account? <a href="{{route('showLogin')}}" class="text-gray-800 hover:underline">Login now</a></p>
    </div>
</div>
<!-- ./login -->
@include('user.footer')
