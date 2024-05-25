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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('courier_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courier_id')->constrained('couriers')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('shipping_zones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('shipping_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_zone_id')->constrained('shipping_zones')->onDelete('cascade');
            $table->foreignId('shipping_method_id')->constrained('shipping_methods')->onDelete('cascade');
            $table->foreignId('courier_service_id')->constrained('courier_services')->onDelete('cascade');
            $table->float('rate')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('shipping_carriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_zone_id')->constrained('shipping_zones')->onDelete('cascade');
            $table->foreignId('courier_id')->constrained('couriers')->onDelete('cascade');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('shipping_carriers');
        Schema::dropIfExists('shipping_rates');
        Schema::dropIfExists('shipping_zones');
        Schema::dropIfExists('shipping_methods');
        Schema::dropIfExists('courier_services');
        Schema::dropIfExists('couriers');

    }
};
