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
        for($i = 0; $i <= 20; $i++){
                DB::table('stats')->insert([
                    'taller_id' => rand (1 , 10),
                    'fecha' => '2018-'.rand(1,12).'-'.rand(1,9),
                    'asistencias' => rand(6,10),
                    'faltas' => rand(1,5),
                ]);
        }
    }
}
