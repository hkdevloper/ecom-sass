<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('route_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('team_id')->nullable()->constrained();
            $table->string('method', 191)->nullable();
            $table->string('route', 191)->nullable();
            $table->integer('status')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->dateTime('date');
            $table->unsignedInteger('counter');
            $table->index('date');
        });

        DB::statement('ALTER TABLE route_statistics ADD INDEX route_statistics_user_id_date_route_method_index (user_id, date, route(100), method(10))');
        DB::statement('ALTER TABLE route_statistics ADD INDEX route_statistics_team_id_date_route_method_index (team_id, date, route(100), method(10))');
        DB::statement('ALTER TABLE route_statistics ADD INDEX route_statistics_route_method_date_index (route(100), method(10), date)');


    }

    public function down() : void
    {
        Schema::dropIfExists('route_statistics');
    }
};
