@extends('layout.app')
@section('title', 'Order Management')

@section('content')
    <livewire:admin.orders />
@endsection

<div>
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-600">Order Management 🛒</h1>
        <a href="#" class="btn-blue">Back</a>
    </header>

    <main class="flex-1 container mx-auto px-4 py-8">
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Food Items</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr class="border-b">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Coke x2, Burger x1</td>
                    <td>Pending</td>
                    <td>
                        <button class="btn-green">Mark Completed</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</div>
