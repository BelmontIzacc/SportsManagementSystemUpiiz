<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taller_id')->unsigned()->index();
            $table->foreign('taller_id')->references('id')->on('taller')->onDelete('cascade');
            $table->date('fecha')->default('2018-03-04');  
            $table->integer('asistencias')->default(0);
            $table->integer('faltas')->default(0);

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
        Schema::table('stats', function (Blueprint $table) {
            $table->dropForeign(['taller_id']);
        });
        Schema::drop('stats');
    }
}
