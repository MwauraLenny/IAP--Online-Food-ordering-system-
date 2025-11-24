<div>

    {{-- Success / Error Messages --}}
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Menu List --}}
    <h6>Select Food</h6>
    <div class="row g-3">
        @foreach($foods as $food)
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h6>{{ $food->name }}</h6>
                        <p class="text-muted">KES {{ number_format($food->price, 2) }}</p>
                        <input type="number"
                               min="1"
                               class="form-control mb-2"
                               wire:model="quantities.{{ $food->id }}">
                        <button class="btn btn-sm btn-primary w-100"
                                wire:click="addToCart({{ $food->id }})">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Cart Section --}}
    <hr>
    <h5>Your Cart</h5>

    @if(empty($cart))
        <p class="text-muted">Your cart is empty.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['food']->name }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>KES {{ number_format($item['food']->price, 2) }}</td>
                        <td>KES {{ number_format($item['food']->price * $item['quantity'], 2) }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                    wire:click="removeFromCart({{ $id }})">
                                Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total: KES {{ number_format($this->getCartTotal(), 2) }}</h4>

        <button class="btn btn-success btn-lg mt-3" wire:click="checkout">
            Complete Order
        </button>
    @endif

</div>
