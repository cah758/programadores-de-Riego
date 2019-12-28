<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programador extends Model
{
  public $table = "programador";
  //
  // Definimos los campos de la tabla directamente en la variable de tipo array $fillable
  protected $fillable =  array('modelo', 'serie', 'alta', 'uconexion', 'cliente_id');
  // Relación
  public function sensores()  {
    return $this->hasMany(Sensor::class);
  }

  public function cliente() {
    return $this->belongsTo(cliente::class);
  }
}
