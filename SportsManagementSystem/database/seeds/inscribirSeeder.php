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
        for($i = 0; $i <= 10; $i++){
            DB::table('inscripcion')->insert([
                'usuario_id' => 1,
                'taller_id' =>rand (1 , 10),
            ]);
        }
    }
}
