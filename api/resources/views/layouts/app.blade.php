<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<nav class="bg-blue-500 p-6 mb-6">
    <div class="container mx-auto">
        <a class="text-white" href="{{ route('welcome') }}">{{ config('app.name', 'Laravel') }}</a>
{{--        Navigation --}}
        <div class="float-right">
            <a class="text-white" href="{{ route('welcome') }}">Home</a>
            <a class="text-white" href="{{ route('stores.index') }}">Store</a>
            <a class="text-white" href="{{ route('products.index') }}">Products</a>
            <a class="text-white" href="{{ route('attributes.index') }}">Attributes</a>
        </div>
    </div>
</nav>
<div class="container mx-auto">
    @yield('content')
</div>
</body>
</html>
