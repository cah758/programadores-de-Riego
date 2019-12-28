<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClienteMigration extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('cliente', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('codigo');
          $table->string('razon');
          $table->string('cif', 30)->unique();
          $table->string('direccion');
          $table->string('municipio');
          $table->string('provincia');
          $table->datetime('fechaInicio');
          $table->datetime('fechaFin');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('cliente');
  }
}
