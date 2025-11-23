@extends('layout.app')
@section('title', 'Food Management')

@section('content')
    <livewire:food-manager />
@endsection

<div>
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-purple-600">Food Management 🍔</h1>
        <a href="#" class="btn-purple">Back</a>
    </header>

    <main class="flex-1 container mx-auto px-4 py-8">
        <button class="btn-purple mb-4">Add New Food</button>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-purple-600 text-white">
                <tr>
                    <th>#</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr class="border-b">
                    <td>1</td>
                    <td>Coke</td>
                    <td>KES 70</td>
                    <td>Available</td>
                    <td>
                        <button class="btn-blue">Edit</button>
                        <button class="btn-red">Delete</button>
                    </td>
                </tr>
                <!-- Add more placeholder rows -->
            </tbody>
        </table>
    </main>
</div>
