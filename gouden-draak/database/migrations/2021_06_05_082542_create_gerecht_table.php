<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerechtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerecht', function (Blueprint $table) {
            $table->id();
            $table->integer('menunummer');
            $table->tinyText('menu_toevoeging')->nullable();
            $table->mediumText('naam');
            $table->decimal('prijs', 10, 2);
            $table->integer('soortgerecht_id');
            $table->longText('beschrijving')->nullable();
            $table->integer('pittigheid_id');
            $table->foreign('soortgerecht_id')->references('id')->on('soort_gerecht');
            $table->foreign('pittigheid_id')->references('id')->on('pittigheids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerecht');
    }

}
