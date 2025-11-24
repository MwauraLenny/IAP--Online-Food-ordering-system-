@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container my-4">
    <h3>Checkout</h3>

    @if($cartItems->isEmpty())
        <div class="alert alert-warning">Your cart is empty.</div>
    @else
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Food</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->food->name }}</td>
                    <td>{{ $item->food->category->name ?? '-' }}</td>
                    <td>{{ number_format($item->food->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->food->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="text-end">Total: KES {{ number_format($total, 2) }}</h5>

        <form action="{{ route('checkout.pay') }}" method="POST" class="text-end mt-3">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Pay Now</button>
        </form>
    @endif
</div>
@endsection
