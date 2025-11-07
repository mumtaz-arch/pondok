<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Informasi Pondok Pancasila Reo')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'islamic-green': {
                            50: '#f0f9f0',
                            100: '#dcf2dc',
                            200: '#bae5ba',
                            300: '#8dd48d',
                            400: '#5cb85c',
                            500: '#2e7d32',
                            600: '#1b5e20',
                            700: '#145214',
                            800: '#0d350d',
                            900: '#062a06',
                        },
                        'gold': {
                            50: '#fffdf0',
                            100: '#fef9dc',
                            200: '#fef3ba',
                            300: '#fdec8d',
                            400: '#fce55c',
                            500: '#ffc107',
                            600: '#ffb300',
                            700: '#ff8f00',
                            800: '#ff6f00',
                            900: '#e65100',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Custom CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-gray-50">
    <div id="app">
        <!-- Navigation -->
        @auth
            @include('partials.navigation')
        @endauth

        <!-- Main Content -->
        <main class="@auth(main-content)@endauth">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- JavaScript -->
    @vite(['resources/js/app.js'])

    @stack('scripts')
</body>
</html>
