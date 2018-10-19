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

        $this->call(carreraSeeder::class);
        $this->call(institutoSeeder::class);
        $this->call(tipoSeeder::class);
        $this->call(usuarioSeeder::class);
        $this->call(datosTallerSeeder::class);
        $this->call(datosSeeder::class);
        $this->call(asistenciaSeeder::class);
        $this->call(inscribirSeeder::class);
        $this->call(statsSeeder::class);

        Model::reguard();
    }
}
