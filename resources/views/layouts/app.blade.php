<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS bawaan kamu -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100">
    
    <!-- Navbar, Sidebar, dll -->
    <div class="min-h-screen">
        @yield('content')
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
