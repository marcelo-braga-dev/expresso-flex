<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([StatusColetasSeeder::class]);
        $this->call([StatusPacotesSeeder::class]);
        $this->call([StatusEtiquetasSeeder::class]);
        $this->call([OrigemPacotesSeeder::class]);
        $this->call([ConfigPlataformaSeeder::class]);
        $this->call([MercadoLivreSeeder::class]);
        $this->call([MercadoPagoSeeder::class]);
        $this->call([ConfigColetasSeeder::class]);
    }
}
