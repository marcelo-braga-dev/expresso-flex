<?php

namespace App\src\Etiquetas\Status;

class Impressa extends StatusEtiqueta
{
    private string $status = 'etiqueta_impressa';
    private string $nomeStatus = 'Impressa';

    function getStatus(): string
    {
        return $this->status;
    }

    public function getNomeStatus(): string
    {
        return $this->nomeStatus;
    }
}
