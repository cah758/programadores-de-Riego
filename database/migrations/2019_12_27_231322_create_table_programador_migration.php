<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProgramadorMigration extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */

  public function up()
  {
      Schema::create('programador', function (Blueprint $table) {

          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('modelo');
          $table->string('serie', 30)->unique();
          $table->datetime('alta');
          $table->date('uconexion');
          $table->bigInteger('cliente_id')->unsigned();


        $table->foreign('cliente_id')->references('id')->on('cliente')
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
      Schema::dropIfExists('programador');
  }
}
