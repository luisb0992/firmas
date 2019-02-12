<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $table = "cargas";

    protected $fillable = ["sector_id", "hora_reporte", "total"];

    public function sector(){
      return $this->belongsTo("App\Sector", "sector_id")->withDefault([
        'municipio' => 'vacio'
      ]);
    }
}
