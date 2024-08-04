<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hero-bg {
            background-image: url('https://source.unsplash.com/random/1600x900?ecommerce');
            background-size: cover;
            background-position: center;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="antialiased text-gray-900">

    <!-- Hero Section -->
    <section class="hero-bg h-screen flex items-center justify-center relative">
        <div class="overlay absolute inset-0"></div>
        <div class="text-center text-white z-10">
            <h1 class="text-5xl font-bold mb-4 animate__animated animate__fadeInDown">Welcome to Our E-commerce Platform</h1>
            <p class="text-xl mb-8 animate__animated animate__fadeInUp">Manage your store, products, and orders efficiently.</p>
            <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-lg animate__animated animate__pulse animate__infinite">Register Your Store</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">About Our Platform</h2>
            <p class="text-lg mb-8">Our E-commerce platform allows multiple stores to register, manage products, and track orders. Customers can browse and purchase products, track orders, and enjoy region-specific product visibility.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">Platform Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://source.unsplash.com/random/300x200?user" alt="User Registration" class="w-full h-40 rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">User Registration and Authentication</h3>
                    <p>Secure sign-up, login, and role-based access control.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://source.unsplash.com/random/300x200?product" alt="Product Management" class="w-full h-40 rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">Product Management</h3>
                    <p>Easily add, edit, and delete products with images and categories.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://source.unsplash.com/random/300x200?order" alt="Order Management" class="w-full h-40 rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">Order Management</h3>
                    <p>Efficiently manage orders, track status, and provide order history.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://source.unsplash.com/random/300x200?inventory" alt="Inventory Management" class="w-full h-40 rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">Inventory Management</h3>
                    <p>Track stock levels, get low stock alerts, and view inventory reports.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://source.unsplash.com/random/300x200?billing" alt="Billing System" class="w-full h-40 rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">Billing System</h3>
                    <p>Generate invoices, apply discounts, and integrate payment gateways.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://source.unsplash.com/random/300x200?notification" alt="Notifications" class="w-full h-40 rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">Notifications</h3>
                    <p>Receive push, email, and SMS notifications for order updates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">1. Register</h3>
                    <p>Create an account and set up your store profile.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">2. Add Products</h3>
                    <p>Upload your products, set prices, and manage inventory.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">3. Start Selling</h3>
                    <p>Receive orders, process payments, and track delivery.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="register" class="py-20 bg-blue-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">Register Your Store</h2>
            <div class="max-w-md mx-auto">
                <form action="/register" method="POST" class="bg-white text-gray-900 p-8 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label for="storeName" class="block font-bold mb-2">Store Name</label>
                        <input type="text" id="storeName" name="storeName" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="ownerEmail" class="block font-bold mb-2">Owner Email</label>
                        <input type="email" id="ownerEmail" name="ownerEmail" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-lg">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 E-commerce Platform. All Rights Reserved.</p>
        </div>
    </footer>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</body>
</html>
