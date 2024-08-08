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
        // Schema::create('product_categories', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
        //     $table->string('name');
        //     $table->string('description')->nullable();
        //     $table->string('status')->default('active');
        //     $table->string('thumbnail')->default('https://via.placeholder.com/150');
        //     $table->timestamps();
        // });

        // Schema::create('brand', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('brand_name');
        //     $table->string('description')->nullable();
        //     $table->string('status')->default('active');
        //     $table->string('thumbnail')->default('https://via.placeholder.com/150');
        //     $table->timestamps();
        // });

        // Schema::create('products12', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->text('description')->nullable();
        //     $table->string('status')->default('active');
        //     $table->string('type')->default('product');
        //     $table->float('mrp')->default(0);
        //     $table->float('purchase_price')->default(0);
        //     $table->float('selling_price')->default(0);
        //     $table->string('thumbnail')->default('https://via.placeholder.com/350x450');
        //     $table->json('gallery')->nullable();
        //     $table->boolean('is_visible')->default(true);
        //     $table->dateTime('availability');
        //     $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
        //     $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
        //     $table->foreignId('brand_id')->constrained('brand')->onDelete('cascade');
        //     $table->timestamps();
        // });

        // Schema::create('inventory', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        //     $table->string('sku')->unique();
        //     $table->string('barcode')->unique();
        //     $table->float('quantity')->default(0);
        //     $table->float('security_stock')->default(0);
        //     $table->timestamps();
        // });

        // Schema::create('shipping_details', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        //     $table->boolean('is_backorder')->default(false);
        //     $table->boolean('requires_shipping')->default(true);
        //     $table->timestamps();
        // });

        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. color, size, weight, etc.
            $table->string('type'); // Input type: text, number, date, time, datetime, json, boolean
            $table->string('label')->nullable(); // e.g. Input Label
            $table->string('default')->nullable();
            $table->string('hint')->nullable();
            $table->string('hint_color')->nullable();
            $table->string('helper_text')->nullable();
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->boolean('is_required')->default(true);
            $table->boolean('is_unique')->default(false);
            $table->string('status')->default('active');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->timestamps();
        });

        // Attribute options for select type attributes
        Schema::create('attribute_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->constrained('attributes')->onDelete('cascade');
            $table->string('name');
            $table->string('value');
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
        Schema::dropIfExists('attribute_options');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('shipping_details');
        Schema::dropIfExists('inventory');
        Schema::dropIfExists('products12');
        Schema::dropIfExists('brand');
        Schema::dropIfExists('product_categories');
    }
};
