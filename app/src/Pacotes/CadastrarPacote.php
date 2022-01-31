<?php

namespace App\src\Pacotes;

use App\Models\Pacotes;
use App\src\Pacotes\Info\Cadastrar;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;

class CadastrarPacote extends Cadastrar
{
    private Coleta $coleta;
    private Destinatario $destinatario;
    private Endereco $endereco;
    private string $rastreio;

    public function __construct(Coleta $coleta, Destinatario $destinatario, Endereco $endereco, string $rastreio)
    {
        $this->coleta = $coleta;
        $this->destinatario = $destinatario;
        $this->endereco = $endereco;
        $this->rastreio = $rastreio;
    }

    public function cadastrar()
    {
        $pacotes = new Pacotes();

        return $pacotes->cadastrar($this);
    }

    public function cliente()
    {
        return $this->destinatario->getCliente();
    }

    public function rastreio()
    {
        return $this->rastreio;
    }

    public function codigo()
    {
        return $this->destinatario->getCodigo();
    }

    public function coleta()
    {
        return $this->coleta->getColeta();
    }

    public function endereco()
    {
        return $this->endereco->getEndereco();
    }

    public function entregador()
    {
        return $this->coleta->getEntregador();
    }

    public function destinatario()
    {
        return $this->destinatario->getDestinatario();
    }

    public function status()
    {
        return $this->destinatario->getStatus();
    }

    public function cep()
    {
        return $this->endereco->getCep();
    }

    public function origem()
    {
        return $this->destinatario->getOrigem();
    }

    public function descricao()
    {
        return $this->coleta->getDescricao();
    }
}
