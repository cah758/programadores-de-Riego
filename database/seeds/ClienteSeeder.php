<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i=0; $i <10 ; $i++) {
      Cliente::create([
        'razon'=> $this->generateRandomString(10),
        'cif'=> $this->generateRandomString(10),
        'codigo'=> $this->generateRandomString(10),
        'direccion'=> $this->generateRandomString(20),
        'municipio'=> $this->generateRandomString(10),
        'provincia'=> $this->generateRandomString(10),
        'fechaInicio'=> $this->randomDate(),
        'fechaFin'=> $this->randomDate()
]);
    }


  }

  function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
  }

  function randomDate($formato = "Y-m-d", $limiteInferior = "1970-01-01", $limiteSuperior = "2038-01-01"){
     // Convertimos la fecha como cadena a milisegundos
     $milisegundosLimiteInferior = strtotime($limiteInferior);
     $milisegundosLimiteSuperior = strtotime($limiteSuperior);
     // Buscamos un número aleatorio entre esas dos fechas
     $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
     // Regresamos la fecha con el formato especificado y los milisegundos aleatorios
     return date($formato, $milisegundosAleatorios);
   }
}
