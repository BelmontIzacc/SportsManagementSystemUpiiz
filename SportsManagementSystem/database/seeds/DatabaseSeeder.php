<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(institutoSeeder::class);
        $this->call(carreraSeeder::class);
        $this->call(tipoSeeder::class);
        $this->call(usuarioSeeder::class);
        $this->call(datosTallerSeeder::class);
        $this->call(datosSeeder::class);
        $this->call(asistenciaSeeder::class);
        $this->call(inscribirSeeder::class);
        $this->call(statsSeeder::class);
        $this->call(inicioFinSeeder::class);
        $this->call(ConstanciaSeeder::class);
        $this->call(contactoSeeder::class);

        Model::reguard();
    }
}
