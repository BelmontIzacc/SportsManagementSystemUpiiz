<?php

use Illuminate\Database\Seeder;

class asistenciaSeeder extends Seeder
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
            DB::table('asistencia')->insert([
                'usuario_id'=>$i+1,
                'taller_id'=>rand(1,10),
                'asistencia'=>rand(1,2),
            ]);
        }
    }
}
