<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTafelBestellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tafel_bestelling', function (Blueprint $table) {
            $table->unsignedBigInteger('tafelbezetting_id');
            $table->dateTime('datum');
            $table->unsignedBigInteger('gerecht');
            $table->foreign('tafelbezetting_id')->references('id')->on('tafel_bezetting');
            $table->foreign('gerecht')->references('id')->on('gerecht');
            
            $table->primary(['tafelbezetting_id','datum']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tafel_bestelling');
    }
}
