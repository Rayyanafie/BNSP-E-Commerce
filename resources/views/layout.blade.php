<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-green-800 text-white py-3">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Left Side: Toko Alat Kesehatan -->
            <div class="flex-shrink-0">
                <span class="text-sm font-medium">Toko Alat Kesehatan</span>
            </div>

            <!-- Center: Product Page -->
            <div class="flex-grow flex justify-center">
                @yield('header')
            </div>

            <!-- Right Side (Empty placeholder for alignment) -->
            <div class="flex-shrink-0">
                <button
                    class="bg-red-500 text-white font-medium px-4 py-2 rounded hover:bg-red-600 transition duration-200">
                    Logout
                </button>
            </div>
        </div>
    </header>
    <main>
        <nav class="container mx-auto items-end mt-3 mb-3">@yield('nav')</nav>
        <div class="grid grid-cols-5 gap-4 container mx-10 text-center ">
            <div class="col-span-4 bg-gray-200 ">
                <!-- Kolom pertama (80%) -->
                @yield('content')
            </div>
            <div class="col-span-1 bg-gray-300 p-4 text-center">
                <!-- Kolom kedua (20%) -->
                @yield('aside')
            </div>
        </div>
    </main>
    @vite('resources/js/modal.js')
</body>

</html>