<?php

use Illuminate\Database\Seeder;

class carreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('carrera')->insert([
            'nombre' => 'Docente/Tecnico',
        ]);

        DB::table('carrera')->insert([
            'nombre' => 'Ingeniería en Sistemas Computacionales',
        ]);

        DB::table('carrera')->insert([
            'nombre' => 'Ingeniería en Mecatrónica',
        ]);
        
        DB::table('carrera')->insert([
            'nombre' => 'Ingeniería en Alimentos',
        ]);
        
        DB::table('carrera')->insert([
            'nombre' => 'Ingeniería en Metalúrgica',
        ]);
        
        DB::table('carrera')->insert([
            'nombre' => 'Ingeniería en Ambiental',
        ]);
        
        DB::table('carrera')->insert([
            'nombre' => 'Genérico 1',
        ]);
        
        DB::table('carrera')->insert([
            'nombre' => 'Genérico 2',
        ]);
        
        DB::table('carrera')->insert([
            'nombre' => 'Genérico 3',
        ]);
    }
}
