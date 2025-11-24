<div>
    <h2>My Orders</h2>

    @if($orders->isEmpty())
        <p class="text-muted">No orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="card mb-3 p-3">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Total:</strong> ${{ $order->total ?? 0 }}</p>
                <p><strong>Items:</strong></p>
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->food->name }} x {{ $item->quantity }} (${{ $item->price }})</li>
                    @endforeach
                </ul>
                <p><strong>Payment Status:</strong> {{ $order->payment->status ?? 'N/A' }}</p>
            </div>
        @endforeach
    @endif
</div>
