<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSometesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sometes', function (Blueprint $table) {
            $table->integer('placa_vehiculo')->unsigned();
            $table->integer('id_revision')->unsigned();
            $table->foreign('id_revision')->references('id')->on('revision_calendarizadas');
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
        Schema::dropIfExists('sometes');
    }
}
