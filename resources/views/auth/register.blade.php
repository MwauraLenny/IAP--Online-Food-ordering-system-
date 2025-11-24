@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card p-4 shadow-sm">
            <h4 class="mb-3">Register</h4>
            @if($errors->any()) <div class="alert alert-danger">{{ $errors->first() }}</div> @endif
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                </div>
                <div class="mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-2">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                </div>
                <div class="mb-2">
                    <select name="role" class="form-control" required>
                        <option value="">Select role</option>
                        <option value="customer">Customer</option>
                        <option value="vendor">Vendor</option>
                    </select>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary">Register</button>
                </div>
            </form>
            <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</div>
@endsection
