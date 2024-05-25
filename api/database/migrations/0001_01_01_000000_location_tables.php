<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('country', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->index();
            $table->string('code');
            $table->string('name');
            $table->integer('phonecode');
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->index();
            $table->string('name');
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('pin_code');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('addresses');
    }
};
