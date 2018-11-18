<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InicioFinFecha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inicioFinFecha', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->date('fechaInicio')->default('1994-12-09');
            $table->date('fechaFin')->default('2018-03-04');
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
        Schema::drop('inicioFinFecha');
    }
}
