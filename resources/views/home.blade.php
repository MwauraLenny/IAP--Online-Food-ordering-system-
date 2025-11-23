@extends('layout.app')
@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }} 👋</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 font-semibold hover:underline">Logout</button>
        </form>
    </div>

    <p class="text-gray-600 mb-8">Navigate to your desired section below:</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <a href="{{ route('customer.dashboard') }}" class="card-red">
            <div class="text-5xl mb-3">🏠</div>
            <h3 class="font-semibold text-lg mb-1">Dashboard</h3>
            <p class="text-sm">Quick overview & links</p>
        </a>

        <a href="{{ route('customer.menu') }}" class="card-yellow">
            <div class="text-5xl mb-3">🍔</div>
            <h3 class="font-semibold text-lg mb-1">Menu</h3>
            <p class="text-sm">Browse & order food</p>
        </a>

        <a href="{{ route('customer.cart') }}" class="card-green relative">
            <div class="text-5xl mb-3">🛒</div>
            <h3 class="font-semibold text-lg mb-1">Cart</h3>
            <p class="text-sm">View selected items</p>
            @php $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count(); @endphp
            @if($cartCount > 0)
                <span class="absolute top-3 right-3 bg-white text-green-600 text-xs font-bold px-2 py-1 rounded-full">{{ $cartCount }}</span>
            @endif
        </a>

        <a href="{{ route('customer.orders') }}" class="card-blue relative">
            <div class="text-5xl mb-3">📦</div>
            <h3 class="font-semibold text-lg mb-1">My Orders</h3>
            <p class="text-sm">Track your orders</p>
            @php $pendingOrders = \App\Models\Order::where('user_id', Auth::id())->where('status', 'pending')->count(); @endphp
            @if($pendingOrders > 0)
                <span class="absolute top-3 right-3 bg-white text-blue-600 text-xs font-bold px-2 py-1 rounded-full">{{ $pendingOrders }}</span>
            @endif
        </a>

        @if(Auth::user()->role == 'admin')
        <a href="{{ route('admin.dashboard') }}" class="card-purple">
            <div class="text-5xl mb-3">🛠️</div>
            <h3 class="font-semibold text-lg mb-1">Admin Dashboard</h3>
            <p class="text-sm">Manage food, stock & orders</p>
        </a>
        @endif

    </div>

</div>
@endsection
