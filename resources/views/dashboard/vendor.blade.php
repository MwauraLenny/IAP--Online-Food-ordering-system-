@extends('layouts.app')

@section('title', 'Vendor Dashboard - Food Ordering System')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">{{ $vendorProfile->business_name ?? 'Your Restaurant' }}</h1>
                <p class="mt-1 opacity-90">Welcome back, {{ $user->name }}!</p>
                <div class="mt-2 flex items-center space-x-4">
                    <span class="flex items-center text-sm">
                        <i class="fas fa-star mr-1"></i>
                        {{ number_format($vendorProfile->rating ?? 0, 1) }} Rating
                    </span>
                    <span class="flex items-center text-sm">
                        <i class="fas fa-clock mr-1"></i>
                        {{ $vendorProfile->is_open ? 'Open' : 'Closed' }}
                    </span>
                    @if($vendorProfile->is_verified ?? false)
                        <span class="flex items-center text-sm bg-white bg-opacity-20 px-2 py-1 rounded">
                            <i class="fas fa-check-circle mr-1"></i> Verified
                        </span>
                    @endif
                </div>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-store text-6xl opacity-30"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Today's Orders</p>
                    <p class="text-3xl font-bold text-gray-900">0</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-shopping-bag text-xl text-blue-500"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pending Orders</p>
                    <p class="text-3xl font-bold text-yellow-600">0</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-hourglass-half text-xl text-yellow-500"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Menu Items</p>
                    <p class="text-3xl font-bold text-gray-900">0</p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-hamburger text-xl text-green-500"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Reviews</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $vendorProfile->total_reviews ?? 0 }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-star text-xl text-purple-500"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('vendor.menu') }}" 
            class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center">
                <div class="bg-orange-100 p-4 rounded-lg group-hover:bg-orange-200 transition">
                    <i class="fas fa-utensils text-2xl text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold text-gray-900">Manage Menu</h3>
                    <p class="text-sm text-gray-500">Add or edit menu items</p>
                </div>
            </div>
        </a>

        <a href="{{ route('vendor.orders') }}" 
            class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center">
                <div class="bg-blue-100 p-4 rounded-lg group-hover:bg-blue-200 transition">
                    <i class="fas fa-list-alt text-2xl text-blue-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold text-gray-900">View Orders</h3>
                    <p class="text-sm text-gray-500">Process customer orders</p>
                </div>
            </div>
        </a>

        <a href="{{ route('vendor.settings') }}" 
            class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center">
                <div class="bg-gray-100 p-4 rounded-lg group-hover:bg-gray-200 transition">
                    <i class="fas fa-cog text-2xl text-gray-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold text-gray-900">Settings</h3>
                    <p class="text-sm text-gray-500">Update business info</p>
                </div>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-clock text-green-500 mr-2"></i>Recent Orders
                </h2>
                <a href="{{ route('vendor.orders') }}" class="text-green-500 hover:text-green-600 text-sm">
                    View All <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="p-6">
                <div class="text-center py-8">
                    <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No pending orders</p>
                    <p class="text-sm text-gray-400 mt-1">New orders will appear here</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-info-circle text-green-500 mr-2"></i>Business Info
                </h2>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-sm text-gray-500">Business Name</label>
                    <p class="font-medium text-gray-900">{{ $vendorProfile->business_name ?? 'Not set' }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Cuisine Type</label>
                    <p class="font-medium text-gray-900">{{ ucfirst($vendorProfile->cuisine_type ?? 'Not set') }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Business Address</label>
                    <p class="font-medium text-gray-900">{{ $vendorProfile->business_address ?? 'Not provided' }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Business Phone</label>
                    <p class="font-medium text-gray-900">{{ $vendorProfile->business_phone ?? 'Not provided' }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Delivery Fee</label>
                    <p class="font-medium text-gray-900">KSh {{ number_format($vendorProfile->delivery_fee ?? 0, 2) }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Delivery Time</label>
                    <p class="font-medium text-gray-900">{{ $vendorProfile->delivery_time_minutes ?? 30 }} mins</p>
                </div>
                <div class="pt-4">
                    <a href="{{ route('vendor.settings') }}" 
                        class="text-green-500 hover:text-green-600 text-sm font-medium">
                        Edit Business Info <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="font-semibold text-gray-900">Store Status</h3>
                <p class="text-sm text-gray-500">Toggle your store open/closed status</p>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm {{ $vendorProfile->is_open ? 'text-green-600' : 'text-red-600' }}">
                    {{ $vendorProfile->is_open ? 'Currently Open' : 'Currently Closed' }}
                </span>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors 
                    {{ $vendorProfile->is_open ? 'bg-green-500' : 'bg-gray-300' }}">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform
                        {{ $vendorProfile->is_open ? 'translate-x-6' : 'translate-x-1' }}"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

