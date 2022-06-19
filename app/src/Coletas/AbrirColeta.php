<?php

namespace App\src\Coletas;

use App\Models\SolicitacaoRetiradas;

class AbrirColeta
{
    private $loja;
    private $idUsuario;
    private $idLoja;
    private $cep;
    private $entregador;
    private $status;

    public function __construct($idLoja, $entregador, $status)
    {
        $this->loja = get_loja($idLoja);
        $this->idUsuario = $this->loja->user_id;
        $this->idLoja = $this->loja->id;
        $this->cep = $this->loja->cep;
        $this->entregador = $entregador;
        $this->status = $status;
    }

    public function criar()
    {
        $solicitarRetirada = new SolicitacaoRetiradas();
        $solicitarRetirada->criar($this);

        modalSucesso('Solicitação de coleta realizada com sucesso.');
    }

    public function getLoja()
    {
        return $this->loja;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getIdLoja()
    {
        return $this->idLoja;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getEntregador()
    {
        return $this->entregador;
    }

    public function getStatus()
    {
        return $this->status;
    }

}
