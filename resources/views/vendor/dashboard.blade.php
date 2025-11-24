@extends('layouts.app')

@section('title', 'Vendor Dashboard')

@section('content')
<div class="container my-4">

    <!-- Dashboard Stats -->
    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title">Total Revenue</h6>
                    <h3 class="card-text">KES {{ number_format(\App\Models\Order::sum('total'), 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title">Total Orders</h6>
                    <h3 class="card-text">{{ \App\Models\Order::count() }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title">Total Foods</h6>
                    <h3 class="card-text">{{ \App\Models\Food::count() }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title">Total Categories</h6>
                    <h3 class="card-text">{{ \App\Models\Category::count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
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

    <!-- Foods CRUD -->
    <div class="card shadow-sm p-3 mb-4">
        <h5 class="mb-3">Manage Foods</h5>
        <livewire:food-crud />
    </div>

    <!-- Vendor Orders -->
    <div class="card shadow-sm p-3 mb-4">
        <h5 class="mb-3">All Orders</h5>
        <livewire:vendor-orders />
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('livewire:load', function() {
    // Close Food Modal after save
    Livewire.on('foodSaved', () => {
        const modalEl = document.getElementById('foodModal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();

        // Remove any leftover backdrops
        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
    });
});
</script>
@endpush
@endsection
