@extends('layout.app')

@section('title', 'My Cart')

@section('content')
    <livewire:cart-component />
@endsection

<div>
    <div class="container mt-5">
        <h2 class="mb-4">🛒 My Cart</h2>

        @if(true) {{-- Placeholder: $cartItems->count() > 0 --}}
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 3; $i++)
                <tr>
                    <td>Food Item {{ $i }}</td>
                    <td>KES 70</td>
                    <td>
                        <input type="number" value="1" min="1" class="form-control" style="width:80px;">
                    </td>
                    <td>KES 70</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </td>
                </tr>
                @endfor
                <tr>
                    <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                    <td colspan="2" class="fw-bold">KES 210</td>
                </tr>
            </tbody>
        </table>

        <button class="btn btn-success float-end">Proceed to Checkout</button>
        @else
        <p>Your cart is empty 😔</p>
        <button class="btn btn-primary">Browse Menu</button>
        @endif
    </div>
</div>
