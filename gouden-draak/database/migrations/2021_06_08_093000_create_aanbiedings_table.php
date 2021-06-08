<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAanbiedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aanbieding', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gerecht');
            $table->dateTime('start_datum');
            $table->dateTime('eind_datum')->nullable();
            $table->decimal('nieuwe_prijs', 10, 2);
            $table->longText('aanpassing');
            $table->foreign('id_gerecht')->references('id')->on('gerecht');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aanbieding');
    }
}
