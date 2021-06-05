<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerechtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerechts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menunummer');
            $table->tinyText('menu_toevoeging');
            $table->decimal('prijs', 10, 2);
            $table->string('soortgerecht', 100);
            $table->longText('beschrijving');
            $table->string('pittigheid', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerechts');
    }
}
