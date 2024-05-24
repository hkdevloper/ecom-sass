@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <h1 class="text-3xl font-bold mb-5">Attributes Listing</h1>
        <a href="{{ route('attributes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Attribute</a>
        <div class="grid grid-cols-2 gap-4">
            @foreach($attributes as $attribute)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold">{{ $attribute->name }}</h2>
                    <!-- Add more attribute details here -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
