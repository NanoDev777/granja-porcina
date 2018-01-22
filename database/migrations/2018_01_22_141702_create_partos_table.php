<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parto', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('vivos');
            $table->tinyInteger('muertos');
            $table->tinyInteger('momificados');
            $table->decimal('peso_camada', 8, 2);
            $table->string('observacion',64)->nullable();
            $table->timestamps();

            //foraneas
            $table->integer('hembra_id')->unsigned();

            //relacion
            $table->foreign('hembra_id')->references('id')->on('reproductores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parto');
    }
}
