@extends('layout.app')

@section('title', 'My Cart')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🛒 My Cart</h2>

    @if($cartItems->count() > 0)
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
            @foreach($cartItems as $item)
            @php $total = $item->quantity * $item->food->price; $grandTotal += $total; @endphp
            <tr>
                <td>{{ $item->food->name }}</td>
                <td>KES {{ $item->food->price }}</td>
                <td>
                    <form action="{{ route('customer.cart.update', $item->id) }}" method="POST" class="d-flex">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control me-2" style="width:80px;">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                </td>
                <td>KES {{ $total }}</td>
                <td>
                    <form action="{{ route('customer.cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
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

    <a href="{{ route('customer.checkout') }}" class="btn btn-success float-end">Proceed to Checkout</a>

    @else
    <p>Your cart is empty 😔</p>
    <a href="{{ route('customer.menu') }}" class="btn btn-primary">Browse Menu</a>
    @endif
</div>
@endsection
