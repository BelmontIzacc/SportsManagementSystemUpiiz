<?php

use Illuminate\Database\Seeder;

class studioDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            for($i = 0; $i <= 10; $i++){
                DB::table('taller')->insert([
                    'nombre' => 'Generico'.rand(1,100),
                    'coordinador' => 'Generico',
                    'tipo_id' => rand (1 , 2),
                    'duracion' => ''.rand (50 , 200),
                    'status' => ''.rand (1 , 4),
                ]);
            }
    }
}
