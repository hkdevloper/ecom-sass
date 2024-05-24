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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->float('total_amount')->default(0);
            $table->float('discount')->default(0);
            $table->float('tax')->default(0);
            $table->float('shipping')->default(0);
            $table->float('grand_total')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->float('quantity')->default(0);
            $table->float('unit_price')->default(0);
            $table->float('total_price')->default(0);
            $table->timestamps();
        });

        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')->onDelete('cascade');
            $table->float('amount')->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('order_refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('order_payments')->onDelete('cascade');
            $table->float('amount')->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('order_payments')->onDelete('cascade');
            $table->float('amount')->default(0);
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('order_transactions');
        Schema::dropIfExists('order_refunds');
        Schema::dropIfExists('order_payments');
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
