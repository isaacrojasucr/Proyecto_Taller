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

            $table->integer('ir')->unsigned();
            $table->integer('pv')->unsigned();


            $table->foreign('ir')->references('id')->on('repuestos');
            $table->foreign('pv')->references('placa')->on('vehiculos');
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
