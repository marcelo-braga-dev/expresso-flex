<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class ConfigColetasSeeder extends Seeder
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
            ->create(['title' => 'Config Coletas']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'config_coleta_horario_limite', 'value' => '']);
    }
}
