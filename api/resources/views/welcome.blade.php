@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <h1 class="text-3xl font-bold text-center">Welcome to {{ config('app.name', 'Laravel') }}</h1>
        <div class="mt-5 flex justify-center">
            <a href="{{ route('stores.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Go to Stores
            </a>
        </div>
    </div>
@endsection
