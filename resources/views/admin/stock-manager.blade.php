@extends('layout.app')
@section('title', 'Stock Management')

@section('content')
    <livewire:stock-manager />
@endsection

<div>
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-green-600">Stock Management 📦</h1>
        <a href="#" class="btn-green">Back</a>
    </header>

    <main class="flex-1 container mx-auto px-4 py-8">
        <button class="btn-green mb-4">Add Stock</button>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th>#</th>
                    <th>Food Item</th>
                    <th>Available Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr class="border-b">
                    <td>1</td>
                    <td>Coke</td>
                    <td>50</td>
                    <td>
                        <button class="btn-blue">Edit</button>
                        <button class="btn-red">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</div>
