<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos;

use App\src\Pacotes\Status\Coletado;

class DadosPacote
{
    private $codigo;
    private $rastreio;
    private $origem;
    private $status;

    public function __construct($codigo = null, $rastreio, $origem)
    {
        $this->codigo = $codigo;
        $this->rastreio = $rastreio;
        $this->origem = $origem;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getRastreio()
    {
        return $this->rastreio;
    }

    public function getOrigem()
    {
        return $this->origem;
    }

    public function getStatus()
    {
        return (new Coletado())->getStatus();
    }
}
