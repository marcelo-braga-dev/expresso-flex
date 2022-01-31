<?php

namespace App\src\Coletas\Status;

use App\src\Coletas\Coleta;
use App\src\Coletas\AceitarColeta;

class Aceito extends StatusColeta
{
    private string $status = 'coleta_aceita';

    function getStatus(): string
    {
        return $this->status;
    }

    public function aceitar(Coleta $coleta, int $idLoja)
    {
        $coletaService = new AceitarColeta($idLoja, $this->status);
        $coletaService->criar();
    }

    public function finalizar(Coleta $coleta)
    {
        $coleta->setStatus(new Finalizado());
    }
}
