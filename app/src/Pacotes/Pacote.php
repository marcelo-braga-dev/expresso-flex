<?php

namespace App\src\Pacotes;

use App\src\Pacotes\Status\Status;

class Pacote
{
    private Status $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function coletar($dados)
    {
        $this->status->coletar($dados);
    }

    public function alterarStatus($dados)
    {
        $this->status->alterarStatus($dados);
    }

    public function finalizar(int $id)
    {
        $this->status->finalizar($id);
    }
    /*

    public function criarPacote(
        $request,
        string $id_seller,
        string $origem,
        array $endereco,
        string $status,
        ?int $loja,
        ?string $idEntregador = '',
        ?string $codigo = '',
        ?int $idColeta = null,
        ?string $descricao = ''
    )
    {
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
                'nome' => $request->nome ?: $endereco['destinatario'],
                'cep' => $cep,
                'telefone' => $request->celular ?: $endereco['telefone'],
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

    protected function setCliente($user_id): void
    {
        $this->user_id = $user_id;
    }

    protected function setEntregador($entregadores): void
    {
        $this->entregadores = $entregadores;
    }
    */
}
