<x-guest-layout>
<div class="min-h-screen flex">

    <!-- LEFT SIDE (Branding / Image) -->
    <div class="hidden lg:flex w-1/2 relative">
        <img src="{{ asset('images/hotel2.jpg') }}"
             class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-black/60 to-black/70"></div>

        <div class="relative z-10 flex flex-col justify-center px-16 text-white">
            <h1 class="text-4xl font-bold tracking-wide">
                REDLION DEVELOPMENT INCORP.
            </h1>
            <p class="mt-6 text-gray-300 text-lg">
                Building Strong Foundations. Delivering Excellence.
            </p>
        </div>
    </div>

    <!-- RIGHT SIDE (Login Form) -->
    <div class="flex w-full lg:w-1/2 items-center justify-center bg-gray-950 px-8 py-12">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-10">
                <img src="{{ asset('images/logo.jpg') }}"
                     class="h-14 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-white">
                    Welcome Back
                </h2>
                <p class="text-gray-400 text-sm mt-2">
                    Login to your account
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-500" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-300"/>
                    <x-text-input id="email"
                        class="block mt-2 w-full bg-gray-900 border-gray-700 text-white focus:border-red-600 focus:ring-red-600"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-300"/>
                    <x-text-input id="password"
                        class="block mt-2 w-full bg-gray-900 border-gray-700 text-white focus:border-red-600 focus:ring-red-600"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-400">
                        <input type="checkbox"
                            name="remember"
                            class="rounded bg-gray-900 border-gray-700 text-red-600 focus:ring-red-600">
                        <span class="ml-2">Remember Me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-red-500 hover:text-red-400">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full py-3 bg-red-600 hover:bg-red-700 transition rounded-lg font-semibold text-white shadow-lg">
                    Log In
                </button>
            </form>

            <!-- Footer -->
            <p class="text-center text-gray-500 text-xs mt-10">
                © {{ date('Y') }} REDLION DEVELOPMENT INCORP.
            </p>

        </div>
    </div>

</div>
</x-guest-layout>