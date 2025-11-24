<div class="d-flex flex-wrap">
    @foreach($foods as $food)
        <div class="card m-2" style="width: 12rem;">
            <img src="{{ $food->image ? asset('storage/'.$food->image) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $food->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $food->name }}</h5>
                <p class="card-text">KES {{ number_format($food->price,2) }}</p>
                <p class="card-text">Stock: {{ $food->stock }}</p>

                <div class="input-group mb-2">
                    <input type="number" min="1" max="{{ $food->stock }}" class="form-control form-control-sm" wire:model="quantity">
                    <button class="btn btn-success btn-sm" wire:click="addToCart({{ $food->id }})">Add</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
