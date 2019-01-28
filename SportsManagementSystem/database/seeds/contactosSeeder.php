<?php

use Illuminate\Database\Seeder;

class contactosSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    *@return void
    */
    public function run()
    {
        //
        $limit = config('global.limite');
        $word = "ABCDEFGHIGKLMNOPQRSTUVWXYZ i o u";
            for($i = 0; $i <= $limit+3; $i++){
                $name = "";

                for($j = 1; $j <= 2; $j++) {
                    $name .= substr(str_shuffle($word), 0, rand (5,10)). ' ';
                }

                DB::table('contactos')->insert([
                    'usuario_id' => $i+1,
                    'nombre' => $name,
                    'telefono' => '4921398872',
                ]);
            }
    }
}
?>
