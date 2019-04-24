<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remate extends Model
{
    protected $fillable = [
      "dia",
      "fecha",
      "mes",
      "ubicacion",
      "subtitulo",
      "hora_almuerzo",
      "hora_ventas",
      "mensaje_adicional",
      "rematador",
      "activo",
      "anno",

    ];

    protected $attributes = [
      "activo" => 0
    ];

    public function hembras(){
      return $this->hasMany("App\RemateHembra");
    }

    public function toros(){
      return $this->hasMany("App\RemateToro");
    }
}
