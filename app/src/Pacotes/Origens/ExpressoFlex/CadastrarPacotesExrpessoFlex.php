<?php

namespace App\src\Pacotes\Origens\ExpressoFlex;

use App\Models\Etiquetas;
use App\Models\Pacotes;
use App\src\Pacotes\NovoPacote;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\DadosPacote;
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
        $etiqueta = (new Etiquetas)->newQuery()
            ->where('id', '=', $id)->first();
        if (empty($etiqueta)) throw new \DomainException('Etiqueta não encontrada.');
        return $etiqueta;
    }

    public function cadastrar()
    {
        $this->jaCadastrado();

        $coleta = $this->getColeta();

        $destinatario = $this->getDestinatario();

        $dadosPacote = new DadosPacote(null, $this->etiqueta->rastreio, $this->origem);

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

    private function jaCadastrado(): void
    {

        $exist = (new Pacotes())->newQuery()
            ->where('rastreio', '=', $this->etiqueta->rastreio)
            ->exists();
        if ($exist) throw new \DomainException('Pacote já cadastrado.');
    }
}
