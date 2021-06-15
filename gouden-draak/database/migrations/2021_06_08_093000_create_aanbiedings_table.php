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
            $table->unsignedBigInteger('gerecht_id');
            $table->string('titel');
            $table->date('start_datum');
            $table->date('eind_datum')->nullable();
            $table->decimal('nieuwe_prijs', 10, 2);
            $table->longText('aanpassing');
            $table->foreign('gerecht_id')->references('id')->on('gerecht');
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
