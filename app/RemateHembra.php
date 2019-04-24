<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemateHembra extends Model
{
  protected $fillable = [
    "remate_id",
    "nombre",
    "cantidad",
  ];
}
