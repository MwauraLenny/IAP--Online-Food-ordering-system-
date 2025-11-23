<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Fresh Food Delivered</title>
    
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-500">🍔 Foodie</h1>
            <nav class="space-x-6">
                <a href="#menu" class="hover:text-red-500 font-medium">Menu</a>
                <a href="#about" class="hover:text-red-500 font-medium">About</a>
                <a href="#contact" class="hover:text-red-500 font-medium">Contact</a>
                <a href="/login" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Login</a>
                <a href="/register" class="border border-red-500 text-red-500 px-4 py-2 rounded-md hover:bg-red-50">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-[url('https://images.unsplash.com/photo-1606756790138-97ef9e8f16a5')] bg-cover bg-center h-[85vh] flex items-center justify-center">
        <div class="bg-black bg-opacity-60 p-10 rounded-xl text-center text-white">
            <h2 class="text-5xl font-bold mb-4">Delicious Food, Fast Delivery</h2>
            <p class="text-lg mb-6">Order your favorite meals from the best restaurants near you!</p>
            <a href="/login" class="bg-red-500 px-6 py-3 text-lg rounded-md hover:bg-red-600 transition">Get Started</a>
        </div>
    </section>

    <!-- Featured Section -->
    <section id="menu" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-gray-800 mb-10">Popular Dishes</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092" alt="Burger" class="rounded-md mb-4">
                    <h4 class="font-semibold text-xl mb-2">Classic Burger</h4>
                    <p class="text-gray-600">Juicy beef patty, melted cheese, and fresh veggies.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1627308595187-7d8e5b4d9f70" alt="Pizza" class="rounded-md mb-4">
                    <h4 class="font-semibold text-xl mb-2">Cheesy Pizza</h4>
                    <p class="text-gray-600">Hot and fresh from the oven, loaded with toppings.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe" alt="Sushi" class="rounded-md mb-4">
                    <h4 class="font-semibold text-xl mb-2">Sushi Platter</h4>
                    <p class="text-gray-600">A variety of rolls made with the freshest ingredients.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-gray-300 py-6 text-center">
        <p>&copy; {{ date('Y') }} Foodie. All rights reserved.</p>
        <p>Made with love by Team Foodie</p>
    </footer>

</body>
</html>
