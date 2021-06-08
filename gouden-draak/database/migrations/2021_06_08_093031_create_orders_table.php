<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gerecht');
            $table->integer('aantal');
            $table->dateTime('datum');
            $table->longText('opmerking')->nullable();
            $table->unsignedBigInteger('bijgerecht')->nullable();
            $table->unsignedBigInteger('aanbieding')->nullable();
            $table->dateTime('afaahaaltijdstip');
            $table->foreign('id_gerecht')->references('id')->on('gerecht');
            $table->foreign('bijgerecht')->references('id')->on('gerecht');
            $table->foreign('aanbieding')->references('id')->on('aanbieding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
