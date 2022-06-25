<?php

namespace App\src\Etiquetas;

use App\src\Etiquetas\Status\Impressa;
use App\src\Etiquetas\Status\Novo;
use App\src\Etiquetas\Status\Visualizada;

class Etiqueta
{
    public $idEndereco;
    public $idDestinatario;
    public $rastreio;
    public $idUsuario;
    public $loja;
    public $origem;

    public function getStatus()
    {
        $nova = new Novo();
        $visualizada = new Visualizada();
        $impressa = new Impressa();

        return [
            $nova->getStatus() => $nova->getNomeStatus(),
            $visualizada->getStatus() => $visualizada->getNomeStatus(),
            $impressa->getStatus() => $impressa->getNomeStatus()
        ];
    }
}
