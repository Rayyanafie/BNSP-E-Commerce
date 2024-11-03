@extends('layouts.app')

@section('header')
<h1 class="text-center mb-4">Product Page</h1>
@endsection

@section('nav')
<div class="container d-flex justify-content-between align-items-center my-3">
    <!-- Left Side: Add New Product Button -->
    <!-- Add New Product Button -->
    <a href="#modalOverlay" data-bs-toggle="modal" class="btn btn-dark">Add New Product</a>

    <!-- Right Side: Cart Button -->
    <a href="{{ route('cart.index') }}" class="btn btn-warning">Cart</a>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- Product Listing (Left Column) -->
        <div class="col-lg-9">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        window.location.href = "{{ route('products.index') }}";
                    }, 3000); // Redirect after 3 seconds
                </script>
            @endif

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            @if ($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                    class="card-img-top">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">${{ number_format($product->price, 2) }}</p>

                                <div class="d-grid gap-2">
                                    <!-- View Button -->
                                    <button class="btn btn-outline-secondary">View</button>

                                    <!-- Buy Button -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-success">Buy</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Categories Sidebar (Right Column) -->
        <div class="col-lg-3">
            <aside class="bg-light rounded p-3 shadow-sm">
                <h4 class="text-center">Categories</h4>
                <ul class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <li class="list-group-item">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</div>
@endsection

<!-- Button to trigger modal -->

<!-- Modal Definition -->
<div id="modalOverlay" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal form content -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name"
                            required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"
                            placeholder="Enter product description"></textarea>
                    </div>
                    <!-- Product Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Product Category</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter price"
                            required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>