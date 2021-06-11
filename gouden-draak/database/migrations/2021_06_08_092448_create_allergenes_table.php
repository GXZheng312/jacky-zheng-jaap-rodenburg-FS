<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergenes', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 45);
            $table->text('beschrijving');
        });

        Schema::create('allergene_gerecht', function (Blueprint $table) {
            $table->unsignedBigInteger('gerecht_id');
            $table->unsignedBigInteger('allergenes_id');
            $table->foreign('allergenes_id')->references('id')->on('allergenes');
            $table->foreign('gerecht_id')->references('id')->on('gerecht');

            $table->primary(['gerecht_id', 'allergenes_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergenes');
        Schema::dropIfExists('allergene_gerecht');
    }
}
