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
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('gerecht_id');
            $table->integer('aantal');
            $table->longText('opmerking')->nullable();
            $table->unsignedBigInteger('aanbieding_id')->nullable();
            
            $table->foreign('aanbieding_id')->references('id')->on('aanbieding');
            $table->foreign('gerecht_id')->references('id')->on('gerecht');
            $table->foreign('order_id')->references('id')->on('orders');
        });

        Schema::create('bijgerecht_bestelling', function (Blueprint $table) {
            $table->unsignedBigInteger('order_bestelling_id');
            $table->unsignedBigInteger('bijgerecht_id');
            $table->integer('aantal')->default(1);
            
            $table->foreign('order_bestelling_id')->references('id')->on('order_bestelling');
            $table->foreign('bijgerecht_id')->references('id')->on('gerecht');
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
