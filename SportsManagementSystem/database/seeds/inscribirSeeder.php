<?php

use Illuminate\Database\Seeder;

class inscribirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 25; $i++){
            DB::table('inscripcion')->insert([
                'usuario_id' => rand (4 , 24),
                'taller_id' =>rand (1 , 10),
            ]);
        }
    }
}
