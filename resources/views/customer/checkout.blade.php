@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Checkout</h2>

    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <div class="alert alert-info">Your cart is empty. <a href="{{ route('home') }}">Go back to menu</a>.</div>
    @else
        <div class="row">
            <!-- Cart Items -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Your Cart</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Food</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->food->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->food->price, 2) }}</td>
                                    <td>{{ number_format($item->food->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Order Summary & Payment -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Total Items:</strong> {{ $cartItems->count() }}</p>
                        <p><strong>Total Amount:</strong> KES {{ number_format($total, 2) }}</p>

                        <form action="{{ route('checkout.place') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Pay Now</button>
                        </form>

                        <a href="{{ route('customer.dashboard') }}" class="btn btn-link w-100 mt-2">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
