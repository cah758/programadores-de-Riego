<?php

use Illuminate\Database\Seeder;
use App\Programador;
use App\Cliente;

class ProgramadorSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
     $clientes = Cliente::all();
     $modelo = ["A", "B", "C"];
     $date =new DateTime();

     for ($i=0; $i <30 ; $i++) {
       Programador::create([
         'modelo'=> $modelo[array_rand($modelo)],
         'serie'=> $this->generateRandomString(10),
         'alta'=> $this->randomDate("Y-m-d"),
         'uconexion'=> $date->modify('-30 minute'),
         'cliente_id' => $clientes[rand(0, count($clientes) - 1)]->id
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
