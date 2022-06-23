<?php

namespace App\src\Coletas\Status;

use App\src\Coletas\AbrirColeta;
use App\src\Coletas\Coleta;

class Aceito extends StatusColeta
{
    private string $status = 'coleta_aceita';

    function getStatus(): string
    {
        return $this->status;
    }

    public function aceitar(Coleta $coleta, int $idLoja)
    {
        $coletaService = new AbrirColeta($idLoja, id_usuario_atual(), $this->status);
        return $coletaService->criar();
    }

    public function finalizar(Coleta $coleta)
    {
        $coleta->setStatus(new Finalizado());
    }
}
