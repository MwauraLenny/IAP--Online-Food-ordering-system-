@extends('layout.app')

@section('title', 'My Cart')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🛒 My Cart</h2>

    @if(!empty($cart) && count($cart) > 0)
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
            @php $grandTotal = 0; @endphp
            @foreach($cart as $foodId => $item)
            @php $total = $item['quantity'] * $item['food']->price; $grandTotal += $total; @endphp
            <tr>
                <td>{{ $item['food']->name }}</td>
                <td>KES {{ $item['food']->price }}</td>
                <td>
                    <form action="{{ route('cart.update', $foodId) }}" method="POST" class="d-flex">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control me-2" style="width:80px;">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                </td>
                <td>KES {{ $total }}</td>
                <td>
                    <form action="{{ route('cart.remove', $foodId) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                <td colspan="2" class="fw-bold">KES {{ $grandTotal }}</td>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">Clear Cart</button>
    </form>

    <a href="{{ route('checkout.index') }}" class="btn btn-success float-end">Proceed to Checkout</a>

    @else
    <p>Your cart is empty 😔</p>
    <a href="{{ route('menu') }}" class="btn btn-primary">Browse Menu</a>
    @endif
</div>
@endsection
