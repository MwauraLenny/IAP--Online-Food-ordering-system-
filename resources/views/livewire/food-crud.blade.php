<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Foods</h5>
        <button class="btn btn-primary" wire:click="$toggle('showForm')">
            {{ $showForm ? 'Hide Form' : 'Add Food' }}
        </button>
    </div>

    <!-- Success/Error Alerts -->
    @if ($successMessage)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $successMessage }}
            <button type="button" class="btn-close" wire:click="$set('successMessage', null)"></button>
        </div>
    @endif

    @if ($errorMessage)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errorMessage }}
            <button type="button" class="btn-close" wire:click="$set('errorMessage', null)"></button>
        </div>
    @endif

    <!-- Inline Card Form -->
    @if($showForm)
        <div class="card mb-3 p-3 border shadow-sm">
            <h6>{{ $updateMode ? 'Edit Food' : 'Add New Food' }}</h6>
            <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                <input wire:model="name" class="form-control mb-2" placeholder="Name">
                <textarea wire:model="description" class="form-control mb-2" placeholder="Description"></textarea>
                <input wire:model="price" class="form-control mb-2" placeholder="Price">
                <input wire:model="stock" class="form-control mb-2" placeholder="Stock">
                <select wire:model="category_id" class="form-select mb-2">
                    <option value="">Choose category</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
                <input type="file" wire:model="image" class="form-control mb-2">

                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2" wire:click="resetInput">Cancel</button>
                    <button type="submit" class="btn btn-primary">{{ $updateMode ? 'Save' : 'Create' }}</button>
                </div>
            </form>
        </div>
    @endif

    <!-- Foods Table -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foods as $food)
            <tr>
                <td>{{ $food->name }}</td>
                <td>{{ $food->category->name ?? '-' }}</td>
                <td>{{ number_format($food->price, 2) }}</td>
                <td>{{ $food->stock }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" wire:click="edit({{ $food->id }})">Edit</button>
                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $food->id }})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
