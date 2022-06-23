<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\Models\Etiquetas;
use App\Models\Pacotes;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\NovoPacote;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\DadosPacote;
use App\src\Pacotes\Status\Coletado;

class PacoteImportado
{
    private $etiqueta;
    private int $idColeta;
    private int $entregador;
    private string $origem;
    private $rastreio;

    public function __construct($rastreio, $origem)
    {
        $this->rastreio = $rastreio;
        $this->origem = $origem;
    }

    private function getEtiqueta($id, $origem)
    {
        return (new Etiquetas)->newQuery()
            ->where('rastreio', '=', $id)
            ->where('origem', '=', $origem)
            ->first();
    }

    public function cadastrar($dados, $origem)
    {
        $this->etiqueta = $this->getEtiqueta($dados['id'], $origem);
        $this->cadastrado();
        $this->idColeta = $dados['coleta'];
        $this->entregador = $dados['entregador'];
        $this->origem = $origem;

        $coleta = $this->getColeta();

        $destinatario = $this->getDestinatario();

        $dadosPacote = new DadosPacote(null, $this->etiqueta->rastreio, $origem);

        $pacote = new NovoPacote($coleta, $destinatario, $dadosPacote);
        return $pacote->cadastrar();
    }

    private function getColeta(): Coleta
    {
        return new Coleta($this->idColeta, $this->entregador, new Coletado());
    }

    private function getDestinatario(): Destinatario
    {
        $destinatario = new Destinatario();
        $destinatario->setId($this->etiqueta->destinatarios_id);

        $destinatario->setIdEndereco($this->etiqueta->enderecos_id);

        return $destinatario;
    }

    public function verificar(): bool
    {
        return (new Etiquetas())->newQuery()
            ->where('rastreio', '=', $this->rastreio)
            ->where('origem', '=', $this->origem)
            ->exists();
    }

    private function cadastrado()
    {
        if ((new Pacotes())->newQuery()
            ->where('rastreio', '=', $this->rastreio)
            ->where('origem', '=', $this->origem)
            ->exists()) throw new \DomainException('Pacote já cadastrado');;
    }
}
