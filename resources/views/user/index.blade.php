@extends('layout.app')

@section('header')
<h1 class="text-center mb-4">Product Page</h1>
@endsection

@section('nav')
<div class="container d-flex justify-content-between align-items-center my-3">
    <!-- Right Side: Cart Button -->
    <a href="{{ route('cart.index') }}" class="btn btn-warning ms-auto w-20">Cart</a>
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

            <div class="row" id="productList">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4 product-item" data-category="{{ $product->category->id }}">
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
                                    <button class="btn btn-outline-secondary w-100">View</button>

                                    <!-- Buy Button -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-success w-100">Buy</button>
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
            <aside class="bg-light rounded p-3 shadow-sm text-center">
                <h4 class="text-center">Categories</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#" class="category-link" data-category="all">All</a></li>
                    @foreach ($categories as $category)
                        <li class="list-group-item"><a href="#" class="category-link"
                                data-category="{{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryLinks = document.querySelectorAll('.category-link');
        const productItems = document.querySelectorAll('.product-item');

        categoryLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const categoryId = this.getAttribute('data-category');

                productItems.forEach(item => {
                    if (categoryId === 'all' || item.getAttribute('data-category') === categoryId) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection