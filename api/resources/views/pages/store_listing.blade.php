@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-5">Stores Listing</h1>
            <a href="{{ route('stores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Store</a>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            @foreach($stores as $store)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold">{{ $store->name }}</h2>
                    <!-- Add more store details here -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
