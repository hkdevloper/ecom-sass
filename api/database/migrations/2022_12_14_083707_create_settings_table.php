<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table): void {
            $table->id();

            $table->string('group')->unique();
            $table->string('name')->unique();
            $table->boolean('locked')->default(false);
            $table->json('payload');

            $table->timestamps();

        });
    }
};
