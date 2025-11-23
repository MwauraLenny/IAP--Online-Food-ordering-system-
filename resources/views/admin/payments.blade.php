@extends('layout.app')
@section('title', 'Payments')

@section('content')
<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-yellow-600">Payments 💰</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn-yellow">Back</a>
</header>

<main class="flex-1 container mx-auto px-4 py-8">
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-yellow-600 text-white">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Customer</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Payment Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <tr class="border-b">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Jane Doe</td>
                <td class="py-2 px-4">KES 300</td>
                <td class="py-2 px-4">Paid</td>
                <td class="py-2 px-4">
                    <button class="btn-blue">View Receipt</button>
                </td>
            </tr>
            <!-- Repeat rows dynamically -->
        </tbody>
    </table>
</main>
@endsection
