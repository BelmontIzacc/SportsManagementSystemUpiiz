<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contactos', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('usuario_id')->unsigned()->index();
          $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');

          $table->string('nombre',50)->nullable();
          $table->string('telefono',50)->nullable();

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('contactos', function(Blueprint $table){
          $table->dropForeign(['usuario_id']);
        });

        Schema::drop('contactos');
    }
}
