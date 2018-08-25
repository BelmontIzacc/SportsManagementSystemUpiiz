<?php

use Illuminate\Database\Seeder;

class tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo')->insert([
            'nombre' => 'acuatico',
        ]);
        
        DB::table('tipo')->insert([
            'nombre' => 'acrobacia',
        ]);

        DB::table('tipo')->insert([
            'nombre' => 'electrico',
        ]);
    }
}
