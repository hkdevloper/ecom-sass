<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Product Categories by store
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->string('thumbnail')->default('https://via.placeholder.com/150');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->string('status')->default('active');
            $table->string('type')->default('product');
            $table->float('price')->default(0);
            $table->float('quantity_in_stock')->default(0);
            $table->string('thumbnail')->default('https://via.placeholder.com/350x450');
            $table->json('gallery')->nullable();
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. color, size, weight, etc.
            $table->string('type'); // Input type: text, number, date, time, datetime, json, boolean
            $table->string('label')->nullable(); // e.g. Input Label
            $table->string('status')->default('active');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('attribute_id')->constrained('attributes')->onDelete('cascade');
            $table->longText('value_text')->nullable();
            $table->string('value_string')->nullable();
            $table->integer('value_int')->nullable();
            $table->float('value_float')->nullable();
            $table->date('value_date')->nullable();
            $table->time('value_time')->nullable();
            $table->dateTime('value_datetime')->nullable();
            $table->json('value_json')->nullable();
            $table->boolean('value_boolean')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('values');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
};
