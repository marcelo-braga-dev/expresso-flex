<?php

namespace App\src\Integracoes\MercadoLivre\ImportacaoExcel;

use App\Models\Etiquetas;
use App\src\Etiquetas\ExpressoFlex\EnderecoDestinatario;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;

class CadastrarEtiquetas
{
    private string $origem = 'mercado_livre';

    public function cadastrar(array $dados, $loja)
    {
        foreach ($dados as $dado) {
            if ($this->isImportar($dado['status'])) {
                $idEndereco = $this->getEndereco($dado['endereco']);

                $dadosDestinatario = $dado['destinatario'];
                $destinatario = new CadastrarDestinatario($dadosDestinatario['nome'], null, $dadosDestinatario['documento']);
                $idDestinatario = $destinatario->cadastrar();

                $etiqueta = new Etiquetas();
                $etiqueta->salvar(
                    $idEndereco, $idDestinatario, $dado['codigo'], id_usuario_atual(), $loja, $this->origem
                );
                modalSucesso('Pacotes cadastrados com sucesso!');
            }
        }
    }

    private function isImportar($status): bool
    {
        return $status == 'Etiqueta impressa' ||
            $status == 'Pronto para coleta' ||
            $status == 'Etiqueta pronta para imprimir';
    }

    private function getEndereco($dados)
    {
        $endereco = new EnderecoDestinatario();
        $endereco->cep($dados['cep']);
        $endereco->enderecoCompleto($dados['endereco']);
        $endereco->cidade($dados['cidade']);
        $endereco->estado($dados['cidade']);

        return $endereco->salvar();
    }
}
