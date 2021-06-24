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
            $table->integer('menunummer')->nullable();
            $table->tinyText('menu_toevoeging')->nullable();
            $table->mediumText('naam');
            $table->decimal('prijs', 10, 2);
            $table->unsignedBigInteger('soortgerecht_id');
            $table->unsignedBigInteger('pittigheid_id')->default('1');
            $table->longText('beschrijving')->nullable();
            $table->foreign('soortgerecht_id')->references('id')->on('soort_gerecht')->cascadeOnDelete();
            $table->foreign('pittigheid_id')->references('id')->on('pittigheids')->cascadeOnDelete();
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
