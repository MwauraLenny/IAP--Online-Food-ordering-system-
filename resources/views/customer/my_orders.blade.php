@extends('layout.app')

@section('title', 'My Orders')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📦 My Orders</h2>

    @if($orders->count() > 0)
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Order ID</th>
                <th>Items</th>
                <th>Total</th>
                <th>Status</th>
                <th>Placed On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                        <ul>
                            @foreach($order->orderItems as $item)
                            <li>{{ $item->food->name }} x {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                </td>
                <td>KES {{ $order->total }}</td>
                <td>
                    @if($order->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($order->status == 'completed')
                        <span class="badge bg-success">Completed</span>
                    @elseif($order->status == 'canceled')
                        <span class="badge bg-danger">Canceled</span>
                    @endif
                </td>
                <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>You have no orders yet 😔</p>
    <a href="{{ route('customer.menu') }}" class="btn btn-primary">Browse Menu</a>
    @endif
</div>
@endsection
