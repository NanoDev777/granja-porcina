<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInseminacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inseminacion', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('dosis', 8, 2);
            $table->string('observacion',64)->nullable();
            $table->timestamps();

            //foraneas
            $table->integer('hembra_id')->unsigned();
            $table->integer('semen_id')->unsigned();

            //relacion
            $table->foreign('hembra_id')->references('id')->on('reproductores');
            $table->foreign('semen_id')->references('id')->on('semen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inseminacion');
    }
}
