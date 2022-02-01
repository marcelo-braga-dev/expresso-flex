<?php

namespace App\src\Etiquetas\ExpressoFlex;

use App\Models\Etiquetas;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;

class GerarEtiqueta
{
    public function gerar($dados)
    {
        $idEndereco = $this->getEndereco($dados['endereco']);

        $destinatario = new CadastrarDestinatario($dados['nome'], $dados['celular'], $dados['cpf']);
        $idDestinatario = $destinatario->cadastrar();

        $codigoRastreio = new CodigoRastreio();
        $rastreio = $codigoRastreio->gerar();

        $etiqueta = new Etiquetas();
        $etiqueta->salvar($idEndereco, $idDestinatario, $rastreio, id_usuario_atual(), $dados['loja']);
    }

    private function getEndereco($dados)
    {
        $endereco = new EnderecoDestinatario();
        $endereco->cep($dados['cep']);
        $endereco->rua($dados['rua']);
        $endereco->numero($dados['numero']);
        $endereco->complemento($dados['complemento']);
        $endereco->bairro($dados['bairro']);
        $endereco->cidade($dados['cidade']);

        return $endereco->salvar();
    }
}
