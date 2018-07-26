<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('usuario')->insert([
            'nombre' => 'Izacc',
            'boleta' => '2016670126',
            'tipo' => '1',
            'password' => bcrypt('admin'),
            'edad' => '22',
            'grupo' => '2cm3',
            'semestre' => '6',
            'apellidoPaterno' => 'Belmont',
            'apellidoMaterno' => 'Belmont',
            'email' => 'jisagiizacc@gmail.com',
            'completado'=>1,    
            
        ]);

        if(config('global.desarrollo')){
            DB::table('usuario')->insert([
                'nombre' => 'Alejandra',
                'boleta' => '2016670007',
                'tipo' => '2',
                'password' => bcrypt('fea'),
                'edad' => '20',
                'grupo' => '2cm3',
                'semestre' => '6',
                'apellidoPaterno' => 'Belmont',
                'apellidoMaterno' => 'Belmont',            
                'carrera_id' =>'1',
                'completado'=>1,
            ]);

            $limit = config('global.limite');
            $word = " abcdefghijklmnopqrstuvwxyzae i o u";
            $capitalWord = " ABCDEFGHIJKLMNOPQRSTUVWXYZAEIOU";

            for($i = 0; $i <= $limit; $i++){
                $name = "";
                $lastName1 = substr(str_shuffle($word), 0, rand (5 , 10));
                $lastName2 = substr(str_shuffle($word), 0, rand (5 , 10));
                $email = substr(str_shuffle($word), 0, rand (5 , 15)).'@correo.com';

                for($j = 1; $j <= 2;$j++){
                    $name .= substr(str_shuffle($word), 0, rand (5 , 10)). ' ';
                }

                DB::table('usuario')->insert([
                    'nombre' => $name,
                    'boleta' => '20'.rand(10 , 30).rand(10 , 30).rand(10 , 70).rand(10 , 60),
                    //'tipo' => '2',
                    'password' => bcrypt('0'),
                    'edad' => rand (18 , 22),
                    'grupo' => '2cm3',
                    'semestre' => rand (1 , 9),
                    'apellidoPaterno' => $lastName1,
                    'apellidoMaterno' => $lastName2,
                    'carrera_id' =>rand (1 , 5),
                    'completado'=>1,
                ]);
            }
        }
    }
}
