<?php

use Illuminate\Database\Seeder;

class instituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('institucion')->insert([
            'nombre' => 'UPIIZ',
        ]);
        
        DB::table('institucion')->insert([
            'nombre' => 'Zecyt',
        ]);
        
    }
}
