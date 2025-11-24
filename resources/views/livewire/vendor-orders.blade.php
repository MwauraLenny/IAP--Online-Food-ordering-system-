<div>
    <h2>All Orders</h2>

    @if($orders->isEmpty())
        <p>No orders yet.</p>
    @else
        @foreach($orders as $order)
            <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Customer:</strong> {{ $order->user->name }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Total:</strong> {{ $order->total }}</p>
                <p><strong>Items:</strong></p>
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->food->name }} x {{ $item->quantity }} ({{ $item->price }})</li>
                    @endforeach
                </ul>
                <p><strong>Payment Status:</strong> {{ $order->payment->status ?? 'N/A' }}</p>
            </div>
        @endforeach
    @endif
</div>
