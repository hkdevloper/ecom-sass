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
        // Inventory Management tables
        /*
         * 1. Purchase details
         * 2. Sales details
         * 3. Stock adjustments
         * 4. Supplier details
         * */

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('store_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->float('quantity')->default(0);
            $table->float('unit_cost')->default(0);
            $table->float('total_cost')->default(0);
            $table->timestamps();
        });

        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->float('quantity')->default(0);
            $table->float('unit_price')->default(0);
            $table->float('total_price')->default(0);
            $table->timestamps();
        });

        Schema::create('stock_adjustments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('type')->default('increase');
            $table->float('quantity')->default(0);
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('purchase_details');
        Schema::dropIfExists('sales_details');
        Schema::dropIfExists('stock_adjustments');
    }
};
