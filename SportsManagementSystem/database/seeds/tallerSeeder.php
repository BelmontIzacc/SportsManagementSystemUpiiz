<?php

use Illuminate\Database\Seeder;

class tallerSeeder extends Seeder
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
                DB::table('tallerdatos')->insert([
                    'usuario_id'=>$i+3,
                    'taller_id'=>rand(1,10),
                ]);
            }
    }
}
