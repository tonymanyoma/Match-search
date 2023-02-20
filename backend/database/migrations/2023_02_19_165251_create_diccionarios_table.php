<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiccionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diccionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departamento',100);
            $table->string('localidad',100);
            $table->string('municipio',100);
            $table->string('nombre',100);
            $table->integer('anos_activo');
            $table->string('tipo_persona',50);
            $table->string('tipo_cargo',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diccionarios');
    }
}
