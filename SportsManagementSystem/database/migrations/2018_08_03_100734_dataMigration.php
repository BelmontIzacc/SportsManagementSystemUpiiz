<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned()->index();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');

            $table->integer('institucion_id')->unsigned()->index();
            $table->foreign('institucion_id')->references('id')->on('institucion')->onDelete('cascade');

            $table->integer('carrera_id')->unsigned()->index()->nullable();
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('set null');

            $table->integer('edad');
            $table->string('grupo',5)->nullable();
            $table->string('sexo',2);
            $table->integer('semestre')->nullable();
            $table->string('calle', 50)->nullable();
            $table->string('numExterior', 8)->nullable();
            $table->string('numInterior', 8)->default(0);
            $table->string('colonia', 50)->nullable();
            $table->integer('codigoPostal')->nullable();
            $table->string('telefono',20)->nullable();

            $table->string('alergias',100)->nullable();
            $table->string('estatura',5)->nullable();
            $table->string('peso',10)->nullable();
            $table->string('sangre',5)->nullable();
            $table->integer('segMed')->nullable();
            $table->integer('segIns')->nullable();

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
        Schema::table('informacion', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['institucion_id']);
            $table->dropForeign(['carrera_id']);
        });

        Schema::drop('informacion');
    }
}
