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
    public function up()
    {
        Schema::create('mobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('graphic');
            $table->string('game_version');
            $table->integer('health');
            $table->float('height');
            $table->string('behavior');
            $table->string('spawn');
            $table->string('classification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobs');
    }
};
