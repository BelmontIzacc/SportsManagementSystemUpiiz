<?php

use Illuminate\Database\Seeder;

class datosSeeder extends Seeder
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
            for($i = 0; $i <= $limit+3; $i++){
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
                    'sexo' => ''.rand (0 , 1),
                    'grupo' => '2cm3',
                    'edad' => rand (0 , 9).rand (0 , 9),
                    'telefono' => rand (0 , 9).rand (0 , 9).rand (0 , 99).rand (0 , 99),
                    'alergias' => 'cacahuate,polvo',
                    'estatura' => rand (15,18),
                    'peso' => rand (45,68),
                    'sangre' => 'A+',
                    'segMed' => rand (0,1),
                    'segIns' => rand (0,1),
                ]);
            }
    }
}
