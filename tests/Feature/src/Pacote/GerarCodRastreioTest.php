<?php

namespace Tests\Feature\src\Pacote;

use App\Models\CodigosRastreio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GerarCodRastreioTest extends TestCase
{
    public function test_gerar_cod_rastreio()
    {
        $rastreio = new CodigosRastreio();
        $id = $rastreio->newQuery()
            ->create();

        $codigo = 'TEST-EF'.$id->id.'SP';

        $rastreio->newQuery()
            ->where('id', '=', $id->id)
            ->update(['codigo' => $codigo]);

        $this->assertDatabaseHas($rastreio, ['codigo' => $codigo]);

        return $codigo;
    }
}
