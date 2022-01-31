<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class StatusPacotesSeeder extends Seeder
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
            ->create(['title' => 'Status Pacotes']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'pacote_coletado', 'value' => 'Pacote Coletado']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'pacote_base', 'value' => 'Pacote na Base']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'pacote_entrega_iniciado', 'value' => 'Pacote em trânsito para o destinatário.']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'pacote_entrega_finalizado', 'value' => 'Entrega Finalizada.']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'pacote_destinatario_ausente', 'value' => 'Destinatário não entcontrado.']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'pacote_entrega_cancelada_entregador', 'value' => 'Entrega cancelada pelo entregador.']);
    }
}
