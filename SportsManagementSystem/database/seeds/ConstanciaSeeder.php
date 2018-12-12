<?php

use Illuminate\Database\Seeder;

class ConstanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('constancia')->insert([
            'index' => 1,
        ]);

    }
}
