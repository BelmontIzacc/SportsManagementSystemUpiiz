<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(carrerTableSeeder::class);
        $this->call(instituteSeeder::class);
        $this->call(typeSeeder::class);
        $this->call(userTableSeeder::class);
        $this->call(studioDateSeeder::class);
        $this->call(dataSeeder::class);
        $this->call(assistanceSeeder::class);
        $this->call(studioSeeder::class);

        Model::reguard();
    }
}
