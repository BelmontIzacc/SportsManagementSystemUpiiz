<?php

use Illuminate\Database\Seeder;

class statsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$taller = config('global.taller');
        $stats = config('global.stats');
        
        for($i = 0; $i <= $stats; $i++){
                DB::table('stats')->insert([
                    'taller_id' => rand (1 , $taller),
                    'fecha' => '2018-'.rand(1,12).'-'.rand(1,9),
                    'asistencias' => rand(6,10),
                    'faltas' => rand(1,5),
                ]);
        }
    }
}