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
            $table->string('soortgerecht', 100);
            $table->longText('beschrijving');
            $table->string('pittigheid', 50);
            $table->foreign('soortgerecht')->references('soort')->on('soort_gerecht');
            $table->foreign('pittigheid')->references('pittigheid')->on('pittigheids');
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
