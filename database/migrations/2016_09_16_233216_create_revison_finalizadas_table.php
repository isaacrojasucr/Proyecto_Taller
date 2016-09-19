<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisonFinalizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revison_finalizadas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('placa_vehiculo')->unsigned();
            $table->timestamps();

            $table->foreign('placa_vehiculo')->references('placa')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revison_finalizadas');
    }
}
