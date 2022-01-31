<?php

namespace App\src\Pacotes;

use App\Models\CodigosRastreio;

class CodigoRastreio
{
    public function gerar(): string
    {
        $rastreio = new CodigosRastreio();
        $id = $rastreio->newQuery()
            ->create();

        $codigo = 'EX'.$id->id.'SP';

        $rastreio->newQuery()
            ->where('id', '=', $id->id)
            ->update(['codigo' => $codigo]);

        return $codigo;
    }
}
