<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  public $table = "sensor";
  //
  // Definimos los campos de la tabla directamente en la variable de tipo array $fillable
  protected $fillable =  array('nombre', 'fecha', 'valor',, 'programador_id');

  public function programador()
  {
      return $this->belongsTo(Programador::class);
  }
}
