<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',64);
            $table->date('fecha');
            $table->tinyInteger('dosis');
            $table->timestamps();

            //foraneas
            $table->integer('macho_id')->unsigned()->nullable();
            $table->integer('genetica_id')->unsigned()->nullable();

            //relacion
            $table->foreign('macho_id')->references('id')->on('reproductores');
            $table->foreign('genetica_id')->references('id')->on('genetica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semen');
    }
}
