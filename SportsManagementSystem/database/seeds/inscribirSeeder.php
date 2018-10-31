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
        $taller = config('global.taller');
        $inscri = config('global.inscri');
        $limit = config('global.limite');
        for($i = 0; $i <= $inscri; $i++){
            DB::table('inscripcion')->insert([
                'usuario_id' => rand (4 , $limit),
                'taller_id' =>rand (1 , $taller),
            ]);
        }
    }
}