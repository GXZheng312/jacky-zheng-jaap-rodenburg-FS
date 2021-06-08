<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTafelBezettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tafel_bezetting', function (Blueprint $table) {
            $table->id();
            $table->string('tafelpassword', 200);
            $table->integer('tafelnummer');
            $table->unsignedBigInteger('klant');
            $table->dateTime('start_datum');
            $table->dateTime('assistentie_gevraagd')->nullable();
            $table->unsignedBigInteger('medewerker_dienst');
            $table->foreign('medewerker_dienst')->references('id')->on('medewerkers');
            $table->foreign('klant')->references('id')->on('klant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tafel_bezetting');
    }
}
