<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class OrigemPacotesSeeder extends Seeder
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
            ->create(['title' => 'Origem Pacotes']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'origem_mercado_livre', 'value' => 'Mercado Livre']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'origem_expresso_flex', 'value' => 'Expresso Flex']);

        $meta->values()->newQuery()
            ->create(['meta_key' => 'origem_outros', 'value' => 'Outros']);
    }
}
