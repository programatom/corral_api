<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toro extends Model
{
    protected $fillable = [
      "nombre",
      "raza",
      "descripcion",
      "padre",
      "madre",
      "abuela_paterna",
      "abuelo_paterno",
      "abuela_materna",
      "abuelo_materno",
      "slug",
      "pn_dep",
      "pd_dep",
      "am_dep",
      "lyc_dep",
      "pf_dep",
      "ce_dep",
      "pn_prc",
      "pd_prc",
      "am_prc",
      "lyc_prc",
      "pf_prc",
      "ce_prc",
      "ficha_rp",
      "ficha_hba",
      "ficha_registro",
      "ficha_fn",
      "ficha_ts",
      "ficha_adn",
      "carc_ce",
      "carc_peso",
      "carc_largog",
      "carc_anchog",
      "carc_altog",
      "carc_largo",
      "ranking_estructura",
      "ranking_musculatura",
      "ranking_profundidad",
      "ranking_precocidad",
      "ranking_prepucio",
];
}
