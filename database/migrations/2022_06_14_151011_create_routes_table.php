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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->index()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->bigInteger('initial_stop_id')
                ->index();
            $table->foreign('initial_stop_id')
                ->references('id')
                ->on('stops')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->bigInteger('final_stop_id')
                ->index()
                ->nullable();
            $table->foreign('final_stop_id')
                ->references('id')
                ->on('stops')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('bike_id')
                ->index()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->integer('distance')
                ->nullable();
            $table->integer('duration')
                ->nullable();
            $table->integer('points')
                ->nullable();

            $table->json('mapbox_response')
                ->nullable();
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
        Schema::dropIfExists('routes');
    }
};
