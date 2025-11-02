@extends('layout.app')
@section('title', 'Food Management')

@section('content')
<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-purple-600">Food Management 🍔</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn-purple">Back</a>
</header>

<main class="flex-1 container mx-auto px-4 py-8">
    <button class="btn-purple mb-4">Add New Food</button>
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-purple-600 text-white">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Food Name</th>
                <th class="py-2 px-4">Price</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <tr class="border-b">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Coke</td>
                <td class="py-2 px-4">KES 70</td>
                <td class="py-2 px-4">Available</td>
                <td class="py-2 px-4">
                    <button class="btn-blue">Edit</button>
                    <button class="btn-red">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</main>
@endsection
