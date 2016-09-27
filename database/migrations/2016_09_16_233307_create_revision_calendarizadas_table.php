<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionCalendarizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_calendarizadas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50);
            $table->bigInteger('km_inicial');
            $table->bigInteger('km_revision');
            $table->string('detalle', 10000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revision_calendarizadas');
    }
}
