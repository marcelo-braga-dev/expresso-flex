<?php

namespace App\src\Pacotes\Info;

class Coleta
{
    private int $entregador;
    private int $coleta;
    private ?string $descricao;

    public function __construct(int $entregador, int $coleta, ?string $descicao = null)
    {
        $this->entregador = $entregador;
        $this->coleta = $coleta;
        $this->descricao = $descicao;
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
}
