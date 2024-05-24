@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <h1 class="text-3xl font-bold mb-5">Create New Store</h1>
        <form action="{{ route('stores.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="store_name">
                    Store Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="store_name" name="store_name" type="text" placeholder="Enter store name">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Store
                </button>
            </div>
        </form>
    </div>
@endsection
