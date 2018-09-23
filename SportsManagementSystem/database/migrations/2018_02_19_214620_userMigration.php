<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre', 50);
            $table->string('email')->nullable();
            $table->string('boleta')->unique();
            $table->integer('tipo')->default(2);
            $table->string('password', 60);
            $table->string('apellidoPaterno', 50);
            $table->string('apellidoMaterno', 50);
            $table->integer('permisos')->default(0);
            
            $table->integer('completado')->default(0);
            
            $table->timestamps();
            $table->rememberToken();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
    }
}
