<?php

use Illuminate\Database\Seeder;

class datosTallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $taller = (int)(config('global.taller'));

        for($i = 0; $i <= $taller; $i++){
                DB::table('taller')->insert([
                    'usuario_id' => rand(1,3),
                    'nombre' => 'Generico'.rand(1,100),
                    'tipo_id' => rand (1 , 2),
                    'duracion' => ''.rand (50 , 200),
                    'status' => ''.rand (1 , 4),
                    'lugar' => 'upiiz',
                    'dias' => 'martes,miercoles',
                    'descripcion' => 'Trae tus cosas genericas para este generico curso',
                ]);
        }
    }
}