<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReproductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproductores', function (Blueprint $table) {
            $table->increments('id');

            //atributos
            $table->string('codigo',64);
            $table->enum('origen', ['COMPRA','GRANJA']);
            $table->date('fecha_llegada')->nullable();
            $table->decimal('precio', 8, 2)->nullable();
            $table->decimal('peso', 8, 2)->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['HEMBRA','MACHO']);
            $table->string('condicion',64);
            $table->string('observacion',128)->nullable();
            $table->tinyInteger('estado')->default('1');
            $table->timestamps();

            //foraneas
            $table->integer('genetica_id')->unsigned();
            $table->integer('ubicacion_id')->unsigned();

            //relacion
            $table->foreign('genetica_id')->references('id')->on('genetica');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reproductores');
    }
}
