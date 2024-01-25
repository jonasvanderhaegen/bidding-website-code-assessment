<section class="">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 rounded-lg shadow">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Create an account
                </h1>
                <form wire:submit.prevent="save" method="POST" class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your full name</label>
                        <input wire:model="form.name" type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="John Doe" required="">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input wire:model="form.email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                        @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input wire:model="form.password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                        <input wire:model="form.password_confirmation" type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 required="">
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input wire:model="form.terms_accepted" id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500">I accept the <a wire:navigate class="font-medium text-blue-600 hover:underline" href="{{route('terms-conditions')}}">Terms and Conditions</a></label>
                        </div>

                        @error('terms_accepted')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create an account</button>
                    <p class="text-sm font-light text-gray-500">
                        Already have an account? <a wire:navigate href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
