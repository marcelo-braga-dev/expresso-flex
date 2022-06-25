<?php

namespace App\src\Etiquetas\Status;

class Visualizada
{
    private string $status = 'etiqueta_visualizada';
    private string $nomeStatus = 'Visualizada';

    function getStatus(): string
    {
        return $this->status;
    }

    public function getNomeStatus(): string
    {
        return $this->nomeStatus;
    }
}
