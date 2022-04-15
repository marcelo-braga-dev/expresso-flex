<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class StatusColetasSeeder extends Seeder
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
            ->create(['title' => 'Status Coletas']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'coleta_aceita', 'value' => 'Coleta Aceita']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'coleta_solicitada', 'value' => 'Coleta Solicitada']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'coleta_finalizada', 'value' => 'Coleta Finalizada']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'coleta_cancelada_cliente', 'value' => 'Coleta Cancelada pelo Cliente']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'coleta_cancelada_entregador', 'value' => 'Coleta  Cancelada pelo Entregador']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'coleta_cancelada_dia', 'value' => 'Coleta não Realizada']);
    }
}
