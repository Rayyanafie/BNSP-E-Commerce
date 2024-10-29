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
        <div class="container mx-3 flex justify-between items-center">
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

            </div>
        </div>
    </header>
    <main>
        @yield('form')
    </main>
</body>

</html>