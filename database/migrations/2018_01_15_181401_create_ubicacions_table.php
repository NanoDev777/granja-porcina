<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('nave');
            $table->tinyInteger('sala');
            $table->tinyInteger('estado')->default('1');;

            //foraneas
            $table->integer('fase_id')->unsigned();
            $table->timestamps();

            //relacion
            $table->foreign('fase_id')->references('id')->on('fase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacions');
    }
}
