<?php

use Illuminate\Database\Seeder;

class dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $limit = config('global.limite');
            for($i = 0; $i <= $limit; $i++){
                DB::table('informacion')->insert([
                    'usuario_id' => $i+1,
                    'institucion_id' => rand(1 , 2),
                    'semestre' => rand (1 , 31),
                    'carrera_id' => rand (1 , 2),
                    'calle' => 'Calle generica',
                    'numExterior' => ''.rand (0 , 999),
                    'numInterior' => ''.rand (0 , 999),
                    'colonia' => 'Generica',
                    'codigoPostal' => rand (0 , 9).rand (0 , 9).rand (0 , 99).rand (0 , 99),
                    'sexo' => ''.rand (1 , 2),
                    'grupo' => '2cm3',
                    'semestre' => rand (1 , 9),
                    'edad' => rand (18 , 25),
                ]);
            }
    }
}
