<?php

namespace App\src\Pacotes\Origens\ExpressoFlex;

use App\Models\Etiquetas;
use App\Models\Pacotes;
use App\src\Pacotes\NovoPacote;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Status\Coletado;

class CadastrarPacotesExrpessoFlex
{
    private string $origem = 'origem_expresso_flex';
    private $etiqueta;
    private int $idColeta;
    private int $entregador;

    public function __construct(int $idEtiqueta, int $idColeta, int $entregador)
    {
        $this->etiqueta = $this->getEtiqueta($idEtiqueta);
        $this->idColeta = $idColeta;
        $this->entregador = $entregador;
    }

    private function getEtiqueta($id)
    {
        return Etiquetas::query()->where('id', '=', $id)->first();
    }

    public function cadastrar()
    {
        $this->jaCadastrado();

        $coleta = $this->getColeta();

        $destinatario = $this->getDestinatario();

        $endereco = $this->getEndereco();

        $pacote = new NovoPacote($coleta, $destinatario, $endereco, $this->etiqueta->rastreio);
        $pacote->cadastrar();
    }

    private function getColeta(): Coleta
    {
        return new Coleta($this->entregador, $this->idColeta);
    }

    private function getDestinatario(): Destinatario
    {
        return new Destinatario($this->etiqueta->destinatarios_id,
            $this->etiqueta->user_id, null, new Coletado(), $this->origem);
    }

    private function getEndereco(): Endereco
    {
        return new Endereco($this->etiqueta->enderecos_id);
    }

    private function jaCadastrado(): void
    {
        $exist = (new Pacotes())->newQuery()
            ->where('rastreio', '=', $this->etiqueta->rastreio)
            ->exists();
        if ($exist) throw new \DomainException('Pacote já cadastrado.');
    }
}
