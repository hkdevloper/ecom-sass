<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Food, Electronics, etc.
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->string('thumbnail')->default('https://via.placeholder.com/150');
            $table->timestamps();
        });

        DB::table('store_categories')->insert([
            ['name' => 'Food', 'slug' => 'food', 'description' => 'All types of food items', 'status' => 'active'],
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'All types of electronic items', 'status' => 'active'],
            ['name' => 'Clothing', 'slug' => 'clothing', 'description' => 'All types of clothing items', 'status' => 'active'],
            ['name' => 'Furniture', 'slug' => 'furniture', 'description' => 'All types of furniture items', 'status' => 'active'],
            ['name' => 'Books', 'slug' => 'books', 'description' => 'All types of books', 'status' => 'active'],
            ['name' => 'Stationery', 'slug' => 'stationery', 'description' => 'All types of stationery items', 'status' => 'active'],
            ['name' => 'Toys', 'slug' => 'toys', 'description' => 'All types of toys', 'status' => 'active'],
            ['name' => 'Sports', 'slug' => 'sports', 'description' => 'All types of sports items', 'status' => 'active'],
            ['name' => 'Health & Beauty', 'slug' => 'health-beauty', 'description' => 'All types of health and beauty items', 'status' => 'active'],
            ['name' => 'Automobile', 'slug' => 'automobile', 'description' => 'All types of automobile items', 'status' => 'active'],
            ['name' => 'Home & Kitchen', 'slug' => 'home-kitchen', 'description' => 'All types of home and kitchen items', 'status' => 'active'],
            ['name' => 'Jewelry', 'slug' => 'jewelry', 'description' => 'All types of jewelry items', 'status' => 'active'],
            ['name' => 'Pets', 'slug' => 'pets', 'description' => 'All types of pet items', 'status' => 'active'],
            ['name' => 'Gifts', 'slug' => 'gifts', 'description' => 'All types of gift items', 'status' => 'active'],
            ['name' => 'Others', 'slug' => 'others', 'description' => 'All other items', 'status' => 'active'],
        ]);
        
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('active'); // active, inactive, suspended
            $table->string('type')->default('store'); // store, restaurant, etc.
            $table->foreignId('category_id')->constrained('store_categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->timestamps();
        });

        // store details
        Schema::create('store_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('website')->nullable();
            $table->json('working_days')->nullable();
            $table->string('opening_time');
            $table->string('closing_time');
            $table->timestamps();
        });

        // Store Social Media
        Schema::create('store_social_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });

        // Store Additional Information
        Schema::create('store_additional_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('key');
            $table->text('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
