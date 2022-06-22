<?php

namespace App\src\Pacotes;

use App\Models\Pacotes;
use App\src\Pacotes\Info\Cadastrar;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\DadosPacote;

class NovoPacote extends Cadastrar
{
    private Coleta $coleta;
    private Destinatario $destinatario;
    private DadosPacote $dadosPacote;

    public function __construct(Coleta $coleta, Destinatario $destinatario, DadosPacote $dadosPacote)
    {
        $this->coleta = $coleta;
        $this->destinatario = $destinatario;
        $this->dadosPacote = $dadosPacote;
    }

    public function cadastrar()
    {
        return (new Pacotes())->cadastrar($this);
    }

    public function cliente(): int
    {
        return $this->coleta->getIdCliente();
    }

    public function rastreio()
    {
        return $this->dadosPacote->getRastreio();
    }

    public function codigo()
    {
        return $this->dadosPacote->getCodigo();
    }

    public function coleta()
    {
        return $this->coleta->getColeta();
    }

    public function endereco()
    {
        return $this->destinatario->getIdEndereco();
    }

    public function entregador()
    {
        return $this->coleta->getEntregador();
    }

    public function destinatario()
    {
        return $this->coleta->getEntregador();
    }

    public function status()
    {
        return $this->dadosPacote->getStatus();
    }

    public function cep()
    {
        return $this->destinatario->getIdEndereco(); //
    }

    public function origem()
    {
        return $this->dadosPacote->getOrigem();
    }

    public function descricao()
    {
        return $this->coleta->getDescricao();
    }
}
