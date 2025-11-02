@extends('layout.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📝 Checkout</h2>

    @if($cartItems->count() > 0)
    <form action="{{ route('customer.checkout.placeOrder') }}" method="POST">
        @csrf
        <h4>Delivery Details</h4>
        <div class="mb-3">
            <label for="address" class="form-label">Delivery Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <h4>Order Summary</h4>
        <ul class="list-group mb-3">
            @php $grandTotal = 0; @endphp
            @foreach($cartItems as $item)
            @php $total = $item->quantity * $item->food->price; $grandTotal += $total; @endphp
            <li class="list-group-item d-flex justify-content-between">
                {{ $item->food->name }} x {{ $item->quantity }}
                <span>KES {{ $total }}</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between fw-bold">
                Grand Total
                <span>KES {{ $grandTotal }}</span>
            </li>
        </ul>

        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
    @else
    <p>Your cart is empty 😔</p>
    <a href="{{ route('customer.menu') }}" class="btn btn-primary">Browse Menu</a>
    @endif
</div>
@endsection
