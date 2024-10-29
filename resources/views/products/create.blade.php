@extends('layout')
@section('header')
<h1 class="text-center">Add Product Page</h1>
@endsection
@section('nav')
<div class="mx-auto"><a href="{{ route(name: 'products.index') }}">Back to Product Page</a>
</div>

@endsection

@section('content')
<div class="max-w-lg mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-4">Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- First Name -->
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="first_name" id="first_name"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter first name">
        </div>

        <!-- Product Name -->
        <div>
            <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="product_name" id="product_name"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter product name">
        </div>

        <!-- Product Description -->
        <div>
            <label for="product_description" class="block text-sm font-medium text-gray-700">Product
                Description</label>
            <textarea name="product_description" id="product_description"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                rows="3" placeholder="Enter product description"></textarea>
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter price">
        </div>

        <!-- Product Image -->
        <div>
            <label for="product_image" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="mt-1 block w-full text-gray-500">
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Add
                Product</button>
        </div>
    </form>
</div>
@endsection