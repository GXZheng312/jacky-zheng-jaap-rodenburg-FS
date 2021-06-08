<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservering', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klant');
            $table->dateTime('datum');
            $table->integer('aantal_personen');
            $table->longText('opmerking')->nullable();
            $table->boolean('bevestiging_verstuurd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservering');
    }
}
