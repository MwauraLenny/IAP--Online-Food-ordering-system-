@extends('layout.app')
@section('title', 'Admin Dashboard')

@section('content')
<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-purple-600">Admin Dashboard 🛠️</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-red">Logout</button>
    </form>
</header>

<main class="flex-1 container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-4">Overview</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="card-purple">
            <div class="text-5xl mb-2">🍔</div>
            <h3 class="font-semibold text-lg">Food Items</h3>
            <p class="text-sm">Manage menu items</p>
        </div>
        <div class="card-green">
            <div class="text-5xl mb-2">📦</div>
            <h3 class="font-semibold text-lg">Stock</h3>
            <p class="text-sm">Manage inventory levels</p>
        </div>
        <div class="card-blue">
            <div class="text-5xl mb-2">🛒</div>
            <h3 class="font-semibold text-lg">Orders</h3>
            <p class="text-sm">Track customer orders</p>
        </div>
        <div class="card-yellow">
            <div class="text-5xl mb-2">💰</div>
            <h3 class="font-semibold text-lg">Payments</h3>
            <p class="text-sm">View payments</p>
        </div>
        <div class="card-red">
            <div class="text-5xl mb-2">👥</div>
            <h3 class="font-semibold text-lg">Customers</h3>
            <p class="text-sm">Manage customer list</p>
        </div>
    </div>
</main>

<footer class="bg-white text-center p-4 shadow-inner mt-auto">
    &copy; {{ date('Y') }} Foodie. All Rights Reserved.
</footer>
@endsection
