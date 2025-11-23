@extends('layout.app')

@section('title', 'Checkout')

@section('content')
    <livewire:checkout-component />
@endsection

<div>
    <div class="container mt-5">
        <h2 class="mb-4">📝 Checkout</h2>

        @if(true) {{-- Placeholder: $cartItems->count() > 0 --}}
        <form>
            <h4>Delivery Details</h4>
            <div class="mb-3">
                <label for="address" class="form-label">Delivery Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <h4>Order Summary</h4>
            <ul class="list-group mb-3">
                @for ($i = 1; $i <= 3; $i++)
                <li class="list-group-item d-flex justify-content-between">
                    Food Item {{ $i }} x 1
                    <span>KES 70</span>
                </li>
                @endfor
                <li class="list-group-item d-flex justify-content-between fw-bold">
                    Grand Total
                    <span>KES 210</span>
                </li>
            </ul>

            <button type="submit" class="btn btn-success">Place Order</button>
        </form>
        @else
        <p>Your cart is empty 😔</p>
        <button class="btn btn-primary">Browse Menu</button>
        @endif
    </div>
</div>
