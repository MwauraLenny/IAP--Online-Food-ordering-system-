@extends('layout.app')
@section('title', 'Stock Management')

@section('content')
<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-green-600">Stock Management 📦</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn-green">Back</a>
</header>

<main class="flex-1 container mx-auto px-4 py-8">
    <button class="btn-green mb-4">Add Stock</button>
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Food Item</th>
                <th class="py-2 px-4">Available Quantity</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <tr class="border-b">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Coke</td>
                <td class="py-2 px-4">50</td>
                <td class="py-2 px-4">
                    <button class="btn-blue">
