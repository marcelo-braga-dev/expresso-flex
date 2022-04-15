<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class ConfigPlataformaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metas = new Meta();

        $meta = $metas->newQuery()
            ->create(['title' => 'Configuracoes Plataforma']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'config_plataforma_manutencao', 'value' => '0']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'config_bloqueio_acesso_geral', 'value' => '0']);
    }
}
