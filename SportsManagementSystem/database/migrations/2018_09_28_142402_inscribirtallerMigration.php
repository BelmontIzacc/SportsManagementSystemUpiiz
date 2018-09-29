<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InscribirtallerMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('usuario_id')->unsigned()->index();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');

            $table->integer('taller_id')->unsigned()->index();
            $table->foreign('taller_id')->references('id')->on('taller')->onDelete('cascade'); 

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
        Schema::table('inscripcion', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['taller_id']);
        });
        Schema::drop('inscripcion');
    }
}
