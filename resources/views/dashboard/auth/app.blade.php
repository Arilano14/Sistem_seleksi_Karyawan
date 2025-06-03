<!DOCTYPE html>
<html lang="en" x-data="data()" :class="{ 'theme-dark': dark }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tambahan Link -->
    @include('dashboard.layouts.link')

    <!-- Theme Mode -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="font-workSans scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-400/60 scrollbar-thumb-rounded-full hover:scrollbar-thumb-gray-400/80 transition-all">

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            @yield('container')
        </div>
    </div>

    <!-- Script Alpine.js -->
    <script>
        function data() {
            return {
                dark: localStorage.theme === 'dark' || window.matchMedia('(prefers-color-scheme: dark)').matches,
                toggleTheme() {
                    this.dark = !this.dark;
                    localStorage.theme = this.dark ? 'dark' : 'light';
                    document.documentElement.classList.toggle('dark', this.dark);
                },
                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen;
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false;
                }
            }
        }
    </script>

    <!-- Script Tambahan -->
    @include('dashboard.layouts.script')

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- SweetAlert -->
    <script>
        @if (session()->has('berhasil'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('berhasil') }}',
                icon: 'success',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if (session()->has('gagal'))
            Swal.fire({
                title: 'Gagal',
                text: '{{ session('gagal') }}',
                icon: 'error',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                title: 'Gagal',
                text: @foreach ($errors->all() as $error) '{{ $error }}' @endforeach,
                icon: 'error',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif
    </script>
</body>
</html>
