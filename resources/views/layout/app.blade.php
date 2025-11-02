<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Foodie')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen font-sans flex flex-col">

    <!-- Header / Navbar -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-500">🍔 Foodie</h1>
            <nav class="space-x-6">
                <a href="{{ route('home') }}" class="hover:text-red-500 font-medium">Home</a>
                <a href="{{ route('menu') }}" class="hover:text-red-500 font-medium">Menu</a>
                <a href="{{ route('about') }}" class="hover:text-red-500 font-medium">About</a>
                <a href="{{ route('contact') }}" class="hover:text-red-500 font-medium">Contact</a>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Login</a>
                    <a href="{{ route('register') }}" class="border border-red-500 text-red-500 px-4 py-2 rounded hover:bg-red-50">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6 text-center mt-auto">
        &copy; {{ date('Y') }} Foodie App. All Rights Reserved.
    </footer>

</body>
</html>
