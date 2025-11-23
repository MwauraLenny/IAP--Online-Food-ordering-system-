@extends('layouts.app')

@section('title', 'Login - Food Ordering System')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 -mt-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <i class="fas fa-utensils text-orange-500 text-5xl mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-900">Welcome Back!</h2>
            <p class="mt-2 text-gray-600">Sign in to your account</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('email') border-red-500 @enderror"
                            placeholder="you@example.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" required
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('password') border-red-500 @enderror"
                            placeholder="Enter your password">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-orange-500 focus:ring-orange-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-orange-500 hover:text-orange-600">Forgot password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Sign In
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-medium">
                        Register here
                    </a>
                </p>
            </div>
        </div>

        <div class="bg-blue-50 rounded-lg p-4 text-sm">
            <h4 class="font-medium text-blue-800 mb-2"><i class="fas fa-info-circle mr-1"></i> Demo Accounts</h4>
            <p class="text-blue-700">Customer: customer@test.com / password123</p>
            <p class="text-blue-700">Vendor: vendor@test.com / password123</p>
        </div>
    </div>
</div>
@endsection

