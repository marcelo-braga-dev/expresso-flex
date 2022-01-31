<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class StatusEtiquetasSeeder extends Seeder
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
            ->create(['title' => 'Status Etiquetas']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'etiqueta_novo', 'value' => 'Etiqueta Emitida']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'etiqueta_impressa', 'value' => 'Etiqueta Impressa']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'etiqueta_finalizado', 'value' => 'Etiqueta Finalizado']);
    }
}
