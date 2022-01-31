<?php

namespace App\src\Coletas;

use App\Models\SolicitacaoRetiradas;

class AceitarColeta
{
    public $loja;
    public int $idUsuario;
    public $idLoja;
    public $cep;
    public $entregador;
    public string $status;

    public function __construct(int $idLoja, string $status)
    {
        $this->loja = get_loja($idLoja);
        $this->idUsuario = $this->loja->user_id;
        $this->idLoja = $this->loja->id;
        $this->cep = $this->loja->cep;
        $this->entregador = id_usuario_atual();
        $this->status = $status;
    }

    public function criar()
    {
        $solicitarRetirada = new SolicitacaoRetiradas();
        $solicitarRetirada->criar($this);

        session()->flash('sucesso', 'Solicitação de coleta realizada com sucesso.');
    }
}
