<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klant', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam', 45);
            $table->string('achternaam', 45);
            $table->string('telefoonnummer', 45);
            $table->string('email', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klant');
    }
}
