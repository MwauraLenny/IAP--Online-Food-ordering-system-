<div class="card p-3 mb-3">
    <h3>Your Cart</h3>

    @if($items->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Food</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->food->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>KES {{ number_format($item->food->price, 2) }}</td>
                        <td>KES {{ number_format($item->food->price * $item->quantity, 2) }}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" wire:click="remove({{ $item->id }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end mt-3">
            <h5>Total: KES {{ number_format($total, 2) }}</h5>
            @if($total > 0)
                <a href="{{ route('checkout') }}" class="btn btn-success btn-lg mt-2">Pay Now</a>
            @endif
        </div>
    @endif
</div>
