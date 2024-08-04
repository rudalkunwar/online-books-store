@include('user.header')
<!-- login -->
<div class="container py-16">
    <div class="max-w-lg mx-auto shadow px-6 py-6 rounded bg-white overflow-hidden">
        <div class="flex justify-center items-center flex-col gap-4">
            <div class="">
                <h2 class="text-2xl uppercase font-medium mb-1">Login</h2>
            </div>
            <form action="{{ route('user.login') }}" method="post" autocomplete="off" class="w-full">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">Email address</label>
                        <input type="email" name="email" id="email" required
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-gray-500 placeholder-gray-400"
                            placeholder="youremail@domain.com">
                    </div>
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">Password</label>
                        <input type="password" name="password" id="password" required
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-gray-500 placeholder-gray-400"
                            placeholder="*******">
                    </div>
                </div>
                <div class="md:flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember"
                            id="remember"class="text-gray-600 focus:ring-0 rounded-sm cursor-pointer">
                        <label for="remember" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-gray-600 hover:underline py-2">Forgot password?</a>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-gray-800 border border-gray-800 rounded hover:bg-transparent hover:bg-gray-300 hover:text-gray-800 transition uppercase font-medium">Login</button>
                </div>
            </form>
        </div>
        <p class="mt-4 text-center text-gray-600">
            <span> Don't have an account? </span>
            <a href="{{ route('showRegister') }}" class="text-gray-800 hover:underline">Register now</a>
        </p>
    </div>
</div>
<!-- ./login -->
@include('user.footer')
