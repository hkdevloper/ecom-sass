@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <h1 class="text-3xl font-bold mb-5">Products Listing</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</a>
        <div class="grid grid-cols-2 gap-4">
            @foreach($products as $product)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                    <!-- Add more product details here -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
