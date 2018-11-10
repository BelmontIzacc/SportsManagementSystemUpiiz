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
        $taller = config('global.taller');
        
        for($i = 0; $i <= $limit; $i++){
            DB::table('asistencia')->insert([
                'usuario_id'=>$i+1,
                'taller_id'=>rand(1,$taller),
                'asistencia'=>rand(0,1),
                'fecha' => '2018-'.rand(1,5).'-'.rand(1,30),
            ]);
        }
    }
}