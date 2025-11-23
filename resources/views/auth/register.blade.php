@extends('layouts.app')

@section('title', 'Register - Food Ordering System')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 -mt-8">
    <div class="max-w-2xl w-full space-y-8">
        <div class="text-center">
            <i class="fas fa-utensils text-orange-500 text-5xl mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
            <p class="mt-2 text-gray-600">Join our food ordering platform</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registerForm">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">I want to register as:</label>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($roles as $role)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="role_id" value="{{ $role->id }}" 
                                    {{ old('role_id', 1) == $role->id ? 'checked' : '' }}
                                    class="peer sr-only" onchange="toggleVendorFields()">
                                <div class="p-4 border-2 rounded-lg text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:bg-gray-50 transition">
                                    @if($role->name === 'customer')
                                        <i class="fas fa-user text-3xl text-gray-400 mb-2"></i>
                                        <h3 class="font-medium text-gray-900">Customer</h3>
                                        <p class="text-sm text-gray-500">Order food from restaurants</p>
                                    @else
                                        <i class="fas fa-store text-3xl text-gray-400 mb-2"></i>
                                        <h3 class="font-medium text-gray-900">Vendor</h3>
                                        <p class="text-sm text-gray-500">Sell food to customers</p>
                                    @endif
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('role_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-user-circle mr-2 text-orange-500"></i>Personal Information
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('name') border-red-500 @enderror"
                                placeholder="John Doe">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('email') border-red-500 @enderror"
                                placeholder="you@example.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="+254 700 000 000">
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="123 Main Street">
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Nairobi">
                        </div>

                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State/County</label>
                            <input type="text" id="state" name="state" value="{{ old('state') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Nairobi County">
                        </div>
                    </div>
                </div>

                <div id="vendorFields" class="border-t pt-6 hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-store mr-2 text-orange-500"></i>Business Information
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="business_name" class="block text-sm font-medium text-gray-700">Business Name *</label>
                            <input type="text" id="business_name" name="business_name" value="{{ old('business_name') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('business_name') border-red-500 @enderror"
                                placeholder="Your Restaurant Name">
                            @error('business_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="business_description" class="block text-sm font-medium text-gray-700">Business Description</label>
                            <textarea id="business_description" name="business_description" rows="3"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Tell customers about your restaurant...">{{ old('business_description') }}</textarea>
                        </div>

                        <div>
                            <label for="cuisine_type" class="block text-sm font-medium text-gray-700">Cuisine Type</label>
                            <select id="cuisine_type" name="cuisine_type"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                @foreach($cuisineTypes as $value => $label)
                                    <option value="{{ $value }}" {{ old('cuisine_type') == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="business_phone" class="block text-sm font-medium text-gray-700">Business Phone</label>
                            <input type="tel" id="business_phone" name="business_phone" value="{{ old('business_phone') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="+254 700 000 000">
                        </div>

                        <div class="md:col-span-2">
                            <label for="business_address" class="block text-sm font-medium text-gray-700">Business Address</label>
                            <input type="text" id="business_address" name="business_address" value="{{ old('business_address') }}"
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Restaurant location address">
                        </div>
                    </div>
                </div>

                <div class="border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-lock mr-2 text-orange-500"></i>Security
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" required
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('password') border-red-500 @enderror"
                                placeholder="Min 8 characters">
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Repeat password">
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" required
                        class="h-4 w-4 text-orange-500 focus:ring-orange-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-orange-500 hover:text-orange-600">Terms of Service</a>
                        and <a href="#" class="text-orange-500 hover:text-orange-600">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i>
                    Create Account
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-medium">
                        Sign in here
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleVendorFields() {
        const vendorFields = document.getElementById('vendorFields');
        const vendorRadio = document.querySelector('input[name="role_id"][value="2"]');
        
        if (vendorRadio && vendorRadio.checked) {
            vendorFields.classList.remove('hidden');
            document.getElementById('business_name').required = true;
        } else {
            vendorFields.classList.add('hidden');
            document.getElementById('business_name').required = false;
        }
    }

    document.addEventListener('DOMContentLoaded', toggleVendorFields);
</script>
@endpush
@endsection



