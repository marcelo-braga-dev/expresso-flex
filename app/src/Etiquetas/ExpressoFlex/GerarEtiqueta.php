<?php

namespace App\src\Etiquetas\ExpressoFlex;

use App\Models\Etiquetas;
use App\src\Etiquetas\Etiqueta;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;

class GerarEtiqueta
{
    private string $origem = 'expressoflex';

    public function gerar($dados)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->idUsuario = id_usuario_atual();
        $etiqueta->loja = $dados['loja'];
        $etiqueta->origem = $this->origem;
        $etiqueta->idEndereco = $this->getEndereco($dados['endereco']);

        $destinatario = new CadastrarDestinatario($dados['nome'], $dados['celular'], $dados['cpf']);
        $etiqueta->idDestinatario = $destinatario->cadastrar();

        $codigoRastreio = new CodigoRastreio();
        $etiqueta->rastreio = $codigoRastreio->gerar();

        $etiquetas = new Etiquetas();
        $etiquetas->salvar($etiqueta);
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
