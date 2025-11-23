<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Food Ordering System')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <i class="fas fa-utensils text-orange-500 text-2xl mr-2"></i>
                        <span class="font-bold text-xl text-gray-800">FoodOrder</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->isCustomer())
                            <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-home mr-1"></i> Dashboard
                            </a>
                            <a href="{{ route('customer.restaurants') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-store mr-1"></i> Restaurants
                            </a>
                            <a href="{{ route('customer.orders') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-receipt mr-1"></i> My Orders
                            </a>
                        @else
                            <a href="{{ route('vendor.dashboard') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-chart-line mr-1"></i> Dashboard
                            </a>
                            <a href="{{ route('vendor.menu') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-hamburger mr-1"></i> Menu
                            </a>
                            <a href="{{ route('vendor.orders') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-shopping-bag mr-1"></i> Orders
                            </a>
                            <a href="{{ route('vendor.settings') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">
                                <i class="fas fa-cog mr-1"></i> Settings
                            </a>
                        @endif

                        <div class="flex items-center text-gray-600 px-3 py-2">
                            <i class="fas fa-user-circle text-xl mr-1"></i>
                            <span>{{ auth()->user()->name }}</span>
                            <span class="ml-1 text-xs bg-orange-100 text-orange-600 px-2 py-1 rounded">
                                {{ ucfirst(auth()->user()->getRoleName()) }}
                            </span>
                        </div>

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-500 px-3 py-2">
                                <i class="fas fa-sign-out-alt mr-1"></i> Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-orange-500 px-3 py-2">Login</a>
                        <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">
                            Register
                        </a>
                    @endauth
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-orange-500">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 space-y-2">
                @auth
                    @if(auth()->user()->isCustomer())
                        <a href="{{ route('customer.dashboard') }}" class="block text-gray-600 hover:text-orange-500 py-2">Dashboard</a>
                        <a href="{{ route('customer.restaurants') }}" class="block text-gray-600 hover:text-orange-500 py-2">Restaurants</a>
                        <a href="{{ route('customer.orders') }}" class="block text-gray-600 hover:text-orange-500 py-2">My Orders</a>
                    @else
                        <a href="{{ route('vendor.dashboard') }}" class="block text-gray-600 hover:text-orange-500 py-2">Dashboard</a>
                        <a href="{{ route('vendor.menu') }}" class="block text-gray-600 hover:text-orange-500 py-2">Menu</a>
                        <a href="{{ route('vendor.orders') }}" class="block text-gray-600 hover:text-orange-500 py-2">Orders</a>
                        <a href="{{ route('vendor.settings') }}" class="block text-gray-600 hover:text-orange-500 py-2">Settings</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left text-red-500 py-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-600 hover:text-orange-500 py-2">Login</a>
                    <a href="{{ route('register') }}" class="block text-orange-500 py-2">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Food Ordering System. All rights reserved.</p>
            <p class="text-gray-400 text-sm mt-2">IAP Group Project</p>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>

