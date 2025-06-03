<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-6 text-primary">Selamat Datang</h1>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-primary">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary text-primary bg-white">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-primary">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary text-primary bg-white">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center text-sm text-primary">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-primary hover:underline" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-warning hover:bg-yellow-400 text-primary font-semibold py-2 px-4 rounded-md transition duration-150">
                    Log in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
