@extends('layout')
@section('header')
<h1 class="text-center">Add Product Page</h1>
@endsection
@section('nav')
<div class="mx-auto"><a href="{{ route(name: 'user.index') }}">Back to Product Page</a>
</div>

@endsection

@section('content')
<div class="max-w-lg mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-4">Add New Product</h2>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Product Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter product name" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
            <textarea name="description" id="description"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                rows="3" placeholder="Enter product description"></textarea>
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Product Category</label>
            <select name="category_id" id="category_id"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter price" required>
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-gray-500">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Add Product
            </button>
        </div>
    </form>
</div>

@endsection