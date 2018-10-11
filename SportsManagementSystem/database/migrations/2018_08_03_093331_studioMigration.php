<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudioMigration extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned()->index()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
            
            $table->String('nombre', 50);
            //$table->String('coordinador', 50);
            $table->date('fechaInicio')->default('1994-12-09');
            $table->date('fechaFin')->default('2018-03-04');
            $table->String('duracion', 7);
            $table->String('status', 40);
            $table->String('lugar',70);
            $table->integer('participantes')->default('0');
            $table->String('dias',70);

            $table->String('descripcion')->nullable();

            $table->integer('tipo_id')->unsigned()->index()->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo')->onDelete('set null');

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
        Schema::table('taller', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['tipo_id']);
        });
        Schema::drop('taller');
    }
}
