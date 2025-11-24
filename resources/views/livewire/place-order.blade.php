<div>
    <form wire:submit.prevent="placeOrder">
        @if (session()->has('message')) <div style="color:green">{{ session('message') }}</div> @endif
        @if (session()->has('error')) <div style="color:red">{{ session('error') }}</div> @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                <tr>
                    <td>{{ $food->name }}</td>
                    <td>{{ number_format($food->price,2) }}</td>
                    <td>{{ $food->stock }}</td>
                    <td><input type="number" min="0" max="{{ $food->stock }}" class="form-control" wire:model="quantities.{{ $food->id }}"></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
