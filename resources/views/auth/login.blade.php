@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card p-4 shadow-sm">
            <h4 class="mb-3">Login</h4>
            @if($errors->any()) <div class="alert alert-danger">{{ $errors->first() }}</div> @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
            <p class="mt-3">No account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</div>
@endsection
