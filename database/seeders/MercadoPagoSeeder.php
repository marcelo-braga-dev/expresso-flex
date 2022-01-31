<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class MercadoPagoSeeder extends Seeder
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
            ->create(['title' => 'Dados Mercado Pago']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'mp_private_key', 'value' => '']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'mp_public_key', 'value' => '']);
    }
}
