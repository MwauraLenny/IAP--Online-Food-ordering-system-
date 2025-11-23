@extends('layout.app')

@section('title', 'Menu')

@section('content')
    <livewire:menu-component />
@endsection

<div>
    <div class="container mt-5">
        <h2 class="mb-4">Menu 🍽️</h2>

        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Food Item">
                    <div class="card-body text-center">
                        <h5 class="card-title">Food Item {{ $i }}</h5>
                        <p class="card-text">KES 70</p>
                        <button class="btn btn-danger">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
