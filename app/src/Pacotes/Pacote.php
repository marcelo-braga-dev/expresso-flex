<?php

namespace App\src\Pacotes;

use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;

class Pacote
{
    public function criarPacote(
        $request,
        string $id_seller,
        string $origem,
        array  $endereco,
        string $status,
        ?int $loja,
        ?string $idEntregador = '',
        ?string $codigo = '',
        ?int $idColeta = null,
        ?string $descricao = ''
    ) {
        $pacotes = new Pacotes();
        $pacotesService = new PacotesService(); 

        $codigoRastreio = $this->gerarCodigoRastreio();

        $cep = preg_replace('/\D/', '', $endereco['cep']);

        $pacote = $pacotes::create(
            [
                'user_id' => $id_seller,
                'rastreio' => $codigoRastreio,
                'codigo' => $codigo,
                'coleta' => $idColeta,
                'loja' => $loja,
                'entregador' => $idEntregador,
                'destinatario' => '?',
                'status' => $status,
                'regiao' => $cep,
                'origem' => $origem,
                'descricao' => $descricao
            ]
        );

        if (empty($endereco['complemento'])) $endereco['complemento'] = '';
        if (empty($endereco['estado'])) $endereco['estado'] = '';
        if (empty($endereco['latitude'])) $endereco['latitude'] = '';
        if (empty($endereco['longitude'])) $endereco['longitude'] = '';

        /*
        if (empty($endereco['cep'])) $endereco['cep'] = '';
        if (empty($endereco['rua'])) $endereco['rua'] = '';
        if (empty($endereco['numero'])) $endereco['numero'] = '';
        if (empty($endereco['bairro'])) $endereco['bairro'] = '';
        if (empty($endereco['cidade'])) $endereco['cidade'] = '';
        */

        $idEndereco = $pacote->endereco()->create(
            [
                'cep' => $cep,
                'rua' => $endereco['rua'],
                'numero' => $endereco['numero'],
                'complemento' => $endereco['complemento'],
                'bairro' => $endereco['bairro'],
                'cidade' => $endereco['cidade'],
                'estado' => $endereco['estado'],
                'latitude' => $endereco['latitude'],
                'longitude' => $endereco['longitude'],

            ]
        );        

        $destinatario = $pacote->destinatario()->create(
            [
                'nome' => $request->nome?:$endereco['destinatario'],
                'cep' => $cep,
                'telefone' => $request->celular?:$endereco['telefone'],
                'cpf' => $request->cpf,
                'endereco' => $idEndereco->id
            ]
        );

        $pacote->update(['destinatario' => $destinatario->id]);

        $pacotesService->alteraStatusPacote($pacote->id, $status);

        return $codigoRastreio;
    }

    protected function gerarCodigoRastreio()
    {
        $pacotes = new Pacotes();

        $code = $pacotes->max('id') + 1;

        $codigo = 'EF' . $code . 'SP';

        return $codigo;
    }
}
