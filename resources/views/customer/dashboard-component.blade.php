@extends('layout.app')

@section('title', 'Customer Dashboard')

@section('content')
    <livewire:dashboard-component />
@endsection

<div>
    <div class="container mt-5">
        <h2 class="mb-4">Hello, {{ auth()->user()->name ?? 'Customer' }} 👋</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <a href="#" class="card text-center text-decoration-none text-dark shadow-sm p-3">
                    <h3>🍔 Menu</h3>
                    <p>Browse our delicious meals</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="card text-center text-decoration-none text-dark shadow-sm p-3">
                    <h3>🛒 Cart</h3>
                    <p>View items ready for checkout</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="card text-center text-decoration-none text-dark shadow-sm p-3">
                    <h3>📦 My Orders</h3>
                    <p>Track your order history</p>
                </a>
            </div>
        </div>
    </div>
</div>
