<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemateToro extends Model
{
    protected $fillable = [
      "remate_id",
      "nombre",
      "cantidad",
    ];
}
