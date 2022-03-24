<?php

namespace App\src\Pacotes\Pagamentos\Entregador;

use App\Models\ComissoesEntregadores;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PrecosFretes;
use App\src\Enderecos\RegiaoCep;

class Comissoes
{
    private string $status = 'aberto';
    private int $idPacote;
    private $pacote;
    private string $regiao;


    public function __construct(int $idPacote)
    {
        $this->idPacote = $idPacote;
        $this->pacote = $this->getPacote();
        $this->regiao = $this->getRegiao();
    }

    public function entregador()
    {
        $preco = $this->getPreco(id_usuario_atual());

        $commisaoEntregadores = new ComissoesEntregadores();
        $commisaoEntregadores->criar($this->idPacote, $this->status, $this->regiao, $preco->value);

    }

    public function cliente()
    {
        $preco = $this->getPreco($this->pacote->user_id);

        $commisaoEntregadores = new FretesRealizados();
        $commisaoEntregadores->cadastrar($this->pacote->user_id, $this->idPacote, id_usuario_atual(),
            $this->status, $this->regiao, $preco->value);
    }

    private function getPacote()
    {
        $pacotes = new Pacotes();
        return $pacotes->newQuery()->find($this->idPacote);
    }

    private function getRegiao(): string
    {
        $regiaoCep = new RegiaoCep();
        return $regiaoCep->verificar($this->pacote->cep);
    }

    private function getPreco(int $user)
    {
        $precoFretes = new PrecosFretes();
        return $precoFretes->preco($user, $this->regiao);
    }
}
