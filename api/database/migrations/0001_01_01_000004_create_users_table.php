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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->string('primary_phone')->unique();
            // $table->string('secondary_phone')->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->ipAddress()->nullable();
            $table->macAddress()->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
        });

        // Create a default user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            //'primary_phone' => '1234567890',
            // 'secondary_phone' => '1234567890',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            // 'address_id' => 1,
            'ip_address' => '127.0.0.1',
            'mac_address' => '00:00:00:00:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('store_categories');
    }
};
