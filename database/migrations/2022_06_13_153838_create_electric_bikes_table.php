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
        Schema::create('electric_bikes', function (Blueprint $table) {
            $table->id();
            $table->integer('battery');
            $table->timestamps();
            //$table->foreign('id')->references('id')->on('bikes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electric_bikes');
    }
};
