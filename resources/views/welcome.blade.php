@extends('layouts.app')

@section('content')
<div class="hero d-flex align-items-center justify-content-center text-center" style="height:70vh">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Welcome to FoodApp</h1>
        <p class="lead mb-4">Discover delicious meals, order easily, and enjoy them at your convenience.</p>
        <div class="d-flex justify-content-center gap-3">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
            @endguest
            @auth
                @if(auth()->user()->role === 'vendor')
                    <a href="{{ route('vendor.dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
                @else
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
