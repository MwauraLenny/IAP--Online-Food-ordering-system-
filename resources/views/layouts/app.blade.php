<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Food Ordering System')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #e9ecef; /* soft grey */
        }
        .navbar-brand img {
            height: 40px;
            width: auto;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            font-weight: 500;
            color: #495057; /* dark text for contrast */
        }
        .navbar-nav .nav-link:hover {
            color: #0d6efd; /* bootstrap primary hover */
        }
        .btn-outline-primary {
            border-color: #0d6efd;
            color: #0d6efd;
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }
    </style>

    @livewireStyles
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('foodies.png') }}" alt="Foodies Logo">
                <span class="fw-bold text-dark">Foodies</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item me-2">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary btn-sm px-3" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    @auth
                        @if(auth()->user()->role === 'vendor')
                            <li class="nav-item me-3">
                                <a class="nav-link" href="{{ route('vendor.dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item me-3">
                                <a class="nav-link" href="{{ route('customer.dashboard') }}">Dashboard</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-outline-primary btn-sm">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="py-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts

    @stack('scripts')
</body>
</html>
