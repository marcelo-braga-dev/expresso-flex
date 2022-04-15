<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class MercadoLivreSeeder extends Seeder
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
            ->create(['title' => 'Dados Mercado Livre']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'ml_url_integracao', 'value' => '']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'ml_app_id', 'value' => '']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'ml_url_retorno', 'value' => '']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'ml_client_secret', 'value' => '']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'ml_url_notificacao', 'value' => '']);
    }
}
