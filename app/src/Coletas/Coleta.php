<?php

namespace App\src\Coletas;

use App\src\Coletas\Status\StatusColeta;

class Coleta
{
    private StatusColeta $status;

    public function __construct(StatusColeta $status)
    {
        $this->status = $status;
    }

    public function setStatus(StatusColeta $status)
    {
        $this->status = $status;
    }

    public function aceitar(int $idLoja)
    {
        $this->status->aceitar($this, $idLoja);
    }

    public function solicitar()
    {

    }

    public function finalizar()
    {
        $this->status->finalizar($this);
    }
}
