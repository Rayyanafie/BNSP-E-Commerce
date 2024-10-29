@extends('layout')
@section('header')
<h1 class="text-center">Product Page</h1>
@endsection

@section('nav')
<a href="{{ route('products.create') }}">Add New Product</a>
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