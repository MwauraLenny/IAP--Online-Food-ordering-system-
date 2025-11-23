@extends('layout.app')

@section('title', 'My Orders')

@section('content')
    <livewire:orders-component />
@endsection

<div>
    <div class="container mt-5">
        <h2 class="mb-4">📦 My Orders</h2>

        @if(true) {{-- Placeholder: $orders->count() > 0 --}}
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
                @for ($i = 1; $i <= 3; $i++)
                <tr>
                    <td>#{{ 1000 + $i }}</td>
                    <td>
                        <ul>
                            <li>Food Item 1 x1</li>
                            <li>Food Item 2 x2</li>
                        </ul>
                    </td>
                    <td>KES 210</td>
                    <td>
                        <span class="badge bg-warning text-dark">Pending</span>
                    </td>
                    <td>23 Nov 2025, 12:00</td>
                </tr>
                @endfor
            </tbody>
        </table>
        @else
        <p>You have no orders yet 😔</p>
        <button class="btn btn-primary">Browse Menu</button>
        @endif
    </div>
</div>
