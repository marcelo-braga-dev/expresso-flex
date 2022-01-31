<?php

namespace App\src\Coletas\Status;

use App\Service\ColetaService;
use App\src\Coletas\Coleta;

class Solicitado extends StatusColeta
{
    private string $status = 'coleta_solicitada';

    function getStatus(): string
    {
        return $this->status;
    }

    public function solicitar(Coleta $coleta)
    {

    }
}
