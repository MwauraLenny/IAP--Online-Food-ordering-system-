@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>My Orders</h2>
    @if($orders->isEmpty())
        <div class="alert alert-info">You have no orders yet.</div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Branch</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>${{ number_format($order->total,2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->branch->name ?? 'N/A' }}</td>
                    <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
