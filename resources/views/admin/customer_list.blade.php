@extends('layout.app')
@section('title', 'Customer List')

@section('content')
    <livewire:admin.customers />
@endsection

<div>
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-red-600">Customer List 👥</h1>
        <a href="#" class="btn-red">Back</a>
    </header>

    <main class="flex-1 container mx-auto px-4 py-8">
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="py-2 px-4">#</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Role</th>
                    <th class="py-2 px-4">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr class="border-b">
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">John Doe</td>
                    <td class="py-2 px-4">john@example.com</td>
                    <td class="py-2 px-4">Customer</td>
                    <td class="py-2 px-4">Active</td>
                </tr>
                <!-- Add more placeholder rows as needed -->
            </tbody>
        </table>
    </main>
</div>
