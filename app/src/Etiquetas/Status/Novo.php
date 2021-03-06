<?php

namespace App\src\Etiquetas\Status;

class Novo extends StatusEtiqueta
{
    private string $status = 'etiqueta_novo';
    private string $nomeStatus = 'Nova';

    function getStatus(): string
    {
        return $this->status;
    }

    public function getNomeStatus(): string
    {
        return $this->nomeStatus;
    }
}
