@extends('layouts.app')

@section('title', 'Customer Dashboard - Food Ordering System')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Welcome back, {{ $user->name }}!</h1>
                <p class="mt-1 opacity-90">Ready to order some delicious food?</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-utensils text-6xl opacity-30"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('customer.restaurants') }}" 
            class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center">
                <div class="bg-orange-100 p-4 rounded-lg group-hover:bg-orange-200 transition">
                    <i class="fas fa-store text-2xl text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold text-gray-900">Browse Restaurants</h3>
                    <p class="text-sm text-gray-500">Find your favorite food</p>
                </div>
            </div>
        </a>

        <a href="#"
            class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center">
                <div class="bg-blue-100 p-4 rounded-lg group-hover:bg-blue-200 transition">
                    <i class="fas fa-shopping-cart text-2xl text-blue-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold text-gray-900">My Cart</h3>
                    <p class="text-sm text-gray-500">View your cart</p>
                </div>
            </div>
        </a>

        <a href="{{ route('customer.orders') }}" 
            class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center">
                <div class="bg-green-100 p-4 rounded-lg group-hover:bg-green-200 transition">
                    <i class="fas fa-receipt text-2xl text-green-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold text-gray-900">Order History</h3>
                    <p class="text-sm text-gray-500">Track your orders</p>
                </div>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-clock text-orange-500 mr-2"></i>Recent Orders
                </h2>
            </div>
            <div class="p-6">
                <div class="text-center py-8">
                    <i class="fas fa-shopping-bag text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No orders yet</p>
                    <a href="{{ route('customer.restaurants') }}" class="text-orange-500 hover:text-orange-600 text-sm mt-2 inline-block">
                        Start ordering <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-user text-orange-500 mr-2"></i>Profile Summary
                </h2>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-sm text-gray-500">Name</label>
                    <p class="font-medium text-gray-900">{{ $user->name }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Email</label>
                    <p class="font-medium text-gray-900">{{ $user->email }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Phone</label>
                    <p class="font-medium text-gray-900">{{ $user->phone ?? 'Not provided' }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Address</label>
                    <p class="font-medium text-gray-900">{{ $user->full_address ?: 'Not provided' }}</p>
                </div>
                <div class="pt-4">
                    <a href="{{ route('profile') }}" 
                        class="text-orange-500 hover:text-orange-600 text-sm font-medium">
                        Edit Profile <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900">
                <i class="fas fa-fire text-orange-500 mr-2"></i>Popular Restaurants
            </h2>
            <a href="{{ route('customer.restaurants') }}" class="text-orange-500 hover:text-orange-600 text-sm">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="p-6">
            <div class="text-center py-8">
                <i class="fas fa-store text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Restaurants will appear here</p>
                <p class="text-sm text-gray-400 mt-1">Browse available restaurants to see options</p>
            </div>
        </div>
    </div>
</div>
@endsection

