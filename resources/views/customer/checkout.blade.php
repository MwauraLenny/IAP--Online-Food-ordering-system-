@extends('layout.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🧾 Checkout</h2>

    @if(!empty($cart) && count($cart) > 0)
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cart as $item)
            @php $total = $item['quantity'] * $item['food']->price; $grandTotal += $total; @endphp
            <tr>
                <td>{{ $item['food']->name }}</td>
                <td>KES {{ $item['food']->price }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>KES {{ $total }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                <td class="fw-bold">KES {{ $grandTotal }}</td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('checkout.place') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success float-end">Place Order</button>
    </form>
    @else
    <p>Your cart is empty 😔</p>
    <a href="{{ route('cart.index') }}" class="btn btn-primary">Back to Cart</a>
    @endif
</div>
@endsection
