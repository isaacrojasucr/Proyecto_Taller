<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertenecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perteneces', function (Blueprint $table) {

            $table->integer('id_repuesto')->unsigned();
            $table->integer('placa_vehiculo')->unsigned();
            $table->bigInteger('km_inicial');


            $table->foreign('id_repuesto')->references('id')->on('repuestos');
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
        Schema::dropIfExists('perteneces');
    }
}
