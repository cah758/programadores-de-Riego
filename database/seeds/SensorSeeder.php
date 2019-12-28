<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
     for ($i=0; $i <30 ; $i++) {
       Sensor::create([
         'nombre'=> $this->generateRandomString(10),
         'fecha'=> $this->randomDate(),
         'valor'=> rand(0, 100),
         'programador_id' => random_int(0, 30)
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
