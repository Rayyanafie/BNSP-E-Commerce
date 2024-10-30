@extends('layout')
@section('header')
<h1 class="text-center">Product Page</h1>
@endsection

@section('nav')
<div class="container mx-auto flex justify-between items-center">
    <!-- Left Side: Toko Alat Kesehatan -->
    <div class="flex-shrink-0">
        <button id="myBtn">Add New Product</button>
    </div>

    <!-- Right Side (Empty placeholder for alignment) -->
    <div class="flex-shrink-0">
        <button class="bg-red-500 text-white font-medium px-4 py-2 rounded hover:bg-red-600 transition duration-200">
            Keranjang
        </button>
    </div>
</div>
@endsection

@section('content')
<ul class="grid grid-cols-4 gap-4">
    @foreach ($products as $product)
        <li class="border border-black p-4">
            @if ($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="mx-auto" width="400"
                    height="400">
            @endif
            <p>{{ $product->price }}</p>
            <p>{{ $product->name }}</p>

            <div class="grid grid-cols-2">
                <button
                    class="bg-red-500 text-white font-medium span-col-2 rounded hover:bg-red-600 transition duration-200">View</button>
                <button
                    class="bg-red-500 text-white font-medium  span-col-2 rounded hover:bg-red-600 transition duration-200">Buy</button>
            </div>

        </li>
    @endforeach
</ul>
@endsection


@section('aside')
<aside>
    <h2 class="justify-items-center">Categories</h2>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</aside>
@endsection


<div id="modalOverlay" class="modal-overlay"></div>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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

</div>