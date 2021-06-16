<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBestellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_bestelling', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('gerecht_id');
            $table->integer('aantal');
            $table->unsignedBigInteger('aanbieding')->nullable();
            $table->foreign('aanbieding')->references('id')->on('aanbieding');
            $table->foreign('gerecht_id')->references('id')->on('gerecht');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_bestelling');
    }
}
