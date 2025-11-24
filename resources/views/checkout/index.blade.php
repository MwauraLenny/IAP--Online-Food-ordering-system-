@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Checkout</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @livewire('cart') {{-- your checkout logic is inside Cart Livewire --}}
</div>
@endsection
