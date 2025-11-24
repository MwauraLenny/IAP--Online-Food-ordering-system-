@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
<div class="container my-4">

    {{-- Dashboard Stats --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <h6>Completed Orders</h6>
                <h3>{{ \App\Models\Order::where('user_id', auth()->id())->where('status', 'completed')->count() }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <h6>Total Spent</h6>
                <h3>KES {{ number_format(\App\Models\Order::where('user_id', auth()->id())->sum('total'), 2) }}</h3>
            </div>
        </div>
    </div>

    {{-- Order History --}}
    <div class="card p-3 mb-3 shadow-sm">
        <h5>Order History</h5>
        <livewire:order-history />
    </div>

    {{-- Place Order --}}
    <div class="card p-3 mb-3 shadow-sm">
        <h5>Place Your Order</h5>
        <livewire:place-order />
    </div>

</div>
@endsection
