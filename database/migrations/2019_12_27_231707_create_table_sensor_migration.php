<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensorMigration extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
       protected $fillable =  array('nombre', 'fecha', 'valor');
  public function up()
  {
      Schema::create('sensor', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('nombre');
          $table->double('valor');
          $table->datetime('fecha');
          $table->bigInteger('programador_id')->unsigned();

          $table->foreign('programador_id')->references('id')->on('programador')
          ->onDelete('cascade');

      });

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('sensor');
  }
}
