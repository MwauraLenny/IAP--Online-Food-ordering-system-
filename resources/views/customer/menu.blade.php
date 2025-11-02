@extends('layout.app')

@section('title', 'Menu')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Menu 🍽️</h2>

    <div class="row">
        @foreach($foods as $food)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <imyg src="{{ $food->image }}" class="card-img-top" alt="{{ $food->name }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $food->name }}</h5>
                    <p class="card-text">KES {{ $food->price }}</p>
                    <form action="{{ route('customer.cart.add', $food->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
