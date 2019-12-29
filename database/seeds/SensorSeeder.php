<?php

use Illuminate\Database\Seeder;
use App\Sensor;
use App\Programador;
class SensorSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
     $date =new DateTime();
     $elementos = array('S1', 'S2','S3', 'S4');
     $programadores = Programador::all(); //devolverá todos los programadores
     foreach ($elementos as $tipo ) {
       for ($i=0; $i <1000 ; $i++) {
         Sensor::create([
           'nombre'=> $tipo,
           'fecha'=> $date->modify('-5 minute'),
           'valor'=> rand(0, 100),
           'programador_id' => $programadores[rand(0, count($programadores) - 1)]->id
   ]);
       }
     }



   }

   function generateRandomString($length = 10) {
     return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
   }

}
