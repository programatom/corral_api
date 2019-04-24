<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRematesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("dia");
            $table->string("fecha");
            $table->string("mes");
            $table->string("anno");
            $table->string("ubicacion");
            $table->string("subtitulo");
            $table->string("hora_almuerzo");
            $table->string("hora_ventas");
            $table->string("mensaje_adicional");
            $table->string("rematador");
            $table->integer("activo");
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
        Schema::dropIfExists('remates');
    }
}
