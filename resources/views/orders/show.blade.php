@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Order #{{ $order->id }}</h2>
    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Branch:</strong> {{ $order->branch->name ?? 'N/A' }}</p>

    <h4 class="mt-4">Items</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Food</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Line Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->food->name ?? 'N/A' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price,2) }}</td>
                <td>${{ number_format($item->price * $item->quantity,2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="mt-3">Total: ${{ number_format($order->total,2) }}</h5>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-2">Back to Orders</a>
</div>
@endsection
