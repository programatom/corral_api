<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->string("raza");
            $table->longText("descripcion");
            $table->string("padre");
            $table->string("madre");
            $table->string("abuela_paterna");
            $table->string("abuelo_paterno");
            $table->string("abuela_materna");
            $table->string("abuelo_materno");
            $table->string("slug");
            $table->string("pn_dep");
            $table->string("pd_dep");
            $table->string("am_dep");
            $table->string("lyc_dep");
            $table->string("pf_dep");
            $table->string("ce_dep");
            $table->string("pn_prc");
            $table->string("pd_prc");
            $table->string("am_prc");
            $table->string("lyc_prc");
            $table->string("pf_prc");
            $table->string("ce_prc");
            $table->string("ficha_rp");
            $table->string("ficha_hba");
            $table->string("ficha_registro");
            $table->string("ficha_fn");
            $table->string("ficha_ts");
            $table->string("ficha_adn");
            $table->string("carc_ce");
            $table->string("carc_peso");
            $table->string("carc_largog");
            $table->string("carc_anchog");
            $table->string("carc_altog");
            $table->string("carc_largo");
            $table->string("ranking_estructura");
            $table->string("ranking_musculatura");
            $table->string("ranking_profundidad");
            $table->string("ranking_precocidad");
            $table->string("ranking_prepucio");

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
        Schema::dropIfExists('toros');
    }
}
