<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  // Nombre de la tabla de la base de datos que definimos (Database table name).
  protected $table='cliente';


  // Definimos los campos de la tabla directamente en la variable de tipo array $fillable
  protected $fillable =  array('codigo', 'razon', 'cif', 'direccion',
   'municipio', 'provincia',  'fechaInicio', 'fechaFin');

   // Relación
   public function programadores()
   {
       return $this->hasMany(Programador::class);
   }


}
