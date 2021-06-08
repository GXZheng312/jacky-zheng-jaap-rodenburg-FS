<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerechtAllergenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerecht_allergenes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_gerecht');
            $table->unsignedBigInteger('id_allergenes');
            $table->foreign('id_allergenes')->references('id')->on('allergenes');
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
        Schema::dropIfExists('gerecht_allergenes');
    }
}
