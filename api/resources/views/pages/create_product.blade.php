@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <h1 class="text-3xl font-bold mb-5">Create New Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_name">
                    Product Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_name" name="product_name" type="text" placeholder="Enter product name">
            </div>
            @foreach($attributes as $attribute)
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $attribute->name }}">
                        {{ $attribute->name }}
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="{{ $attribute->name }}" name="{{ $attribute->name }}" type="{{ $attribute->name }}" placeholder="Enter {{ $attribute->name }}">
                </div>
            @endforeach
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Product
                </button>
            </div>
        </form>
    </div>
@endsection
