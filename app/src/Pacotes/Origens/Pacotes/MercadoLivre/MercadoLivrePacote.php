<?php

namespace App\src\Pacotes\Origens\Pacotes\MercadoLivre;

use App\Models\Pacotes;
use App\src\Pacotes\CadastrarPacote;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Info\Coleta;

class MercadoLivrePacote
{
    private $dados;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function cadastrar()
    {
        $coleta = $this->getColeta();

        $cadastrarDestinatario = new DestinatarioML();
        $destinatario = $cadastrarDestinatario->cadastrar($this->dados);

        $rastreio = $this->getRastreio();

        if ($this->exist($destinatario)) print_pre('Ja existe');

        $pacote = new CadastrarPacote(
            $coleta, $destinatario, $cadastrarDestinatario->getEndereco(), $rastreio);
        $pacote->cadastrar();
        print_pre('-FIM-');
    }

    private function getColeta(): Coleta
    {
        $buscarColeta = new BuscarColeta();
        return $buscarColeta->coleta($this->dados['coleta']);
    }

    private function getRastreio(): string
    {
        $codigos = new CodigoRastreio();
        $rastreio = $codigos->gerar();
        return $rastreio;
    }

    private function exist($destinatario): bool
    {
        $pacote = new Pacotes();

        return $pacote->newQuery()
            ->where([
                ['codigo', '=', $destinatario->getCodigo()],
                ['origem', '=', 'mercado_livre']
            ])->exists();
    }
}
