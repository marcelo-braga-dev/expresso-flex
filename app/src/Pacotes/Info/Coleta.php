<?php

namespace App\src\Pacotes\Info;

use App\Models\SolicitacaoRetiradas;
use App\src\Pacotes\Status\Status;

class Coleta
{
    private int $entregador;
    private int $coleta;
    private ?string $descricao;
    private int $idCliente;
    private Status $status;

    public function __construct(int $coleta, int $entregador, Status $status, ?string $descicao = null)
    {
        $this->entregador = $entregador;
        $this->coleta = $coleta;
        $this->descricao = $descicao;
        $this->status = $status;
        $this->setIdCliente($coleta);
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    private function setIdCliente(int $coleta): void
    {
        $this->idCliente = (new SolicitacaoRetiradas())->newQuery()
            ->find($coleta)->user_id;
    }

    public function getEntregador(): int
    {
        return $this->entregador;
    }

    public function getColeta(): int
    {
        return $this->coleta;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function getStatus(): string
    {
        return $this->status->getStatus();
    }
}
