@extends('layout.app')
@section('title', 'Order Management')

@section('content')
<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-blue-600">Order Management 🛒</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn-blue">Back</a>
</header>

<main class="flex-1 container mx-auto px-4 py-8">
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Customer</th>
                <th class="py-2 px-4">Food Items</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <tr class="border-b">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">John Doe</td>
                <td class="py-2 px-4">Coke x2, Burger x1</td>
                <td class="py-2 px-4">Pending</td>
                <td class="py-2 px-4">
                    <button class="btn-green">Mark Completed</button>
                </td>
            </tr>
            <!-- Repeat rows dynamically -->
        </tbody>
    </table>
</main>
@endsection
