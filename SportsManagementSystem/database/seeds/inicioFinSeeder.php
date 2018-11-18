<?php

use Illuminate\Database\Seeder;

class inicioFinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('inicioFinFecha')->insert([
            'fechaInicio' => '1994-12-09',
            'fechaFin' => '2018-03-04',
        ]);

        DB::table('inicioFinFecha')->insert([
            'fechaInicio' => '1994-12-09',
            'fechaFin' => '2018-04-05',
        ]);
        
        
    }
}
