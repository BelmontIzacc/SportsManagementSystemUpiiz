<?php

use Illuminate\Database\Seeder;

class carrerTableSeeder extends Seeder
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
    }
}
