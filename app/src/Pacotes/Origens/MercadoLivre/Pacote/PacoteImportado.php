<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\Models\Etiquetas;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\NovoPacote;
use App\src\Pacotes\Origens\MercadoLivre\MercadoLivre;
use App\src\Pacotes\Status\Coletado;

class PacoteImportado
{
    public function verificar($codigo, $origem): bool
    {
        $etiqueta = new Etiquetas();

        return $etiqueta->newQuery()
            ->where([
                ['codigo', '=', $codigo],
                ['origem', '=', $origem]
            ])->exists();
    }

    public function cadastrar($dados, string $origem)
    {
        $etiqueta = $this->getEtiqueta($dados['id']);

        $coleta = $this->getColeta($dados['coleta']);

        $destinatario = $this->getDestinatario($etiqueta, $dados['id']);

        $endereco = $this->getEndereco($etiqueta);

        $rastreio = $this->getRastreio();

        $pacote = new NovoPacote($coleta, $destinatario, $endereco, $rastreio);
        return $pacote->cadastrar();
    }

    private function getEtiqueta($codigo)
    {
        $etiquetas = new Etiquetas();

        return $etiquetas->newQuery()
            ->where('rastreio', '=', $codigo)
            ->first();
    }

    private function getEndereco($etiqueta): Endereco
    {
        return new Endereco($etiqueta->enderecos_id);
    }

    private function getRastreio(): string
    {
        $codRastreio = new CodigoRastreio();
        return $codRastreio->gerar();
    }

    private function getDestinatario($etiqueta, $id): Destinatario
    {
        $origem = new MercadoLivre();
        return new Destinatario(
            $etiqueta->destinatarios_id, $etiqueta->user_id, $id, new Coletado(), $origem->getOrigem());
    }

    private function getColeta(int $coleta): Coleta
    {
        return new Coleta(id_usuario_atual(), $coleta);
    }
}
