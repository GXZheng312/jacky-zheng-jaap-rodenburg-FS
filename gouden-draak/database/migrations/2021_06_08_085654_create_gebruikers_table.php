<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGebruikersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gebruikers', function (Blueprint $table) {
            $table->id();
            $table->string('gebruikersnaam', 200)->unique();
            $table->string('wachtwoord', 200);
            $table->string('rol', 100)->nullable();
            $table->unsignedBigInteger('id_medewerker')->nullable();
            $table->foreign('rol')->references('rol')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gebruikers');
    }
}
