<!DOCTYPE html>
<html>
<head>
    <title>Login - Foodie</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

<div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input name="email" type="email" placeholder="Email" class="w-full p-2 mb-3 border rounded" required>
        <input name="password" type="password" placeholder="Password" class="w-full p-2 mb-4 border rounded" required>
        <button type="submit" class="bg-red-500 w-full text-white py-2 rounded">Login</button>
    </form>
    <p class="text-center mt-3 text-sm">Don’t have an account? 
        <a href="{{ route('register') }}" class="text-red-500">Register</a>
    </p>
</div>

</body>
</html>
