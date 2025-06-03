@extends('dashboard.auth.app')

@section('container')
<div class="flex flex-col overflow-y-auto md:flex-row">
    <!-- Gambar login -->
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('img/login.jpg') }}" alt="login">
        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('img/login.jpg') }}" alt="login">
    </div>

    <!-- Form Login -->
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200 flex items-center">
                <span>Login</span>
                <button
                    class="rounded-full w-8 h-8 ml-3 text-purple-600 dark:text-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-600"
                    @click="toggleTheme"
                    aria-label="Toggle color mode">
                    <!-- SVG Icon toggleTheme -->
                </button>
            </h1>

            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm mb-1 text-gray-700 dark:text-gray-400">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autofocus
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Email" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block text-sm mb-1 text-gray-700 dark:text-gray-400">Password</label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Password" />
                    @error('password')
                        <label class="text-red-600 text-xs mt-1 block">{{ $message }}</label>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button
                    type="submit"
                    class="block w-full px-4 py-2 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-700 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Login
                </button>
            </form>

            <!-- Link Tambahan -->
            <div class="flex justify-between items-center mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
                <a href="{{ route('register') }}" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">
                    Register
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
