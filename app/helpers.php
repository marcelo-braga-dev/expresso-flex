<?php

use App\Models\Destinatarios;
use App\Models\Enderecos;
use App\Models\LojasClientes;
use App\Models\MetaValues;
use App\Models\PacotesHistoricos;
use App\Models\User;

function id_usuario_atual()
{
    return auth()->user()->id;
}

function get_loja($id)
{
    $loja = new LojasClientes();

    return $loja::query()
        ->where('id', '=', $id)
        ->first();
}

function get_nome_loja($id)
{
    $loja = new LojasClientes();

    $lojas = $loja::query()
        ->where('id', '=', $id)
        ->first();

    return $lojas->nome;
}

function get_status_coleta(string $key)
{
    $metaValue = new MetaValues();

    return $metaValue->value($key);
}

function get_status_pacote(string $key)
{
    $metaValue = new MetaValues();

    return $metaValue->value($key);
}

function get_origem_pacote(string $origem)
{
    $metaValue = new MetaValues();

    return $metaValue->value($origem);
}

function get_dados_usuario(int $id)
{
    return User::find($id);
}

function get_nome_usuario(int $id)
{
    return User::find($id)->name;
}

function get_destinatario_pacote(int $id)
{
    $destinatario = new Destinatarios();

    return $destinatario->query()
        ->where('id', '=', $id)
        ->first();
}

function get_endereco_loja(?int $id)
{
    $loja = LojasClientes::find($id);

    if (!empty($loja)) return get_endereco($loja->endereco);
}

//function get_endereco_destinatario(int $id, $separado = false): string
//{
//    return get_endereco($id);
//}

function get_cep_endereco(int $id)
{
    $endereco = new Enderecos();
    $res = $endereco->newQuery()->find($id);

    return str_replace('-', '', $res->cep);
}

function get_endereco(int $id)
{
    $dados = Enderecos::find($id);

    $cep = formatar_cep($dados->cep);

    if ($dados->endereco_completo) return $dados->endereco_completo;

    $complemento = '';

    if (!empty($dados->complemento)) $complemento = ', Complemento: ' . $dados->complemento;

    return $dados->rua . ', n. ' . $dados->numero . $complemento . ', ' .
        $dados->bairro . ', ' . $dados->cidade . ' - Cep: ' . $cep;
}

function formatar_cep(string $cep)
{
    if (strlen($cep) < 8) $cep = '0' . $cep;

    $cep = preg_replace('/\D/', '', $cep);

    return substr_replace($cep, '-', 5, 0);
}

function get_endereco_separado($id)
{
    return Enderecos::find($id);
}

function print_pre($arg)
{
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    exit();
}

function convertMoneyToFloat(string $valor)
{
    if (!is_numeric($valor)) {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
    }

    return $valor;
}

function convertFloatToMoney($valor): string
{
    return number_format($valor, 2, ',', '.');
}

function modalSucesso($mensagem)
{
    session()->flash('sucesso', $mensagem);
}

function modalErro($mensagem)
{
    session()->flash('erro', $mensagem);
}

function alterarStatusPacote(int $idCliente, int $idPacote, string $status)
{
    $historico = new PacotesHistoricos();
    $historico->novo($idCliente, $idPacote, $status);
}

function converterMes(int $mes)
{
    switch ($mes) {
        case '01':
            return 'Janeiro';
        case '02':
            return 'Fevereiro';
        case '03':
            return 'Março';
        case '04':
            return 'Abril';
        case '05':
            return 'Maio';
        case '06':
            return 'Junho';
        case '07':
            return 'Julho';
        case '08':
            return 'Agosto';
        case '09':
            return 'Setembro';
        case '10':
            return 'Outubro';
        case '11':
            return 'Novembro';
        case '12':
            return 'Dezembro';
    }
    return $mes;
}

function getRastreioPeloId(int $id)
{
    $pacotes = new \App\Models\Pacotes();
    $rastreio = $pacotes->newQuery()->find($id, 'rastreio');

    if (!empty($rastreio)) return $rastreio->rastreio;
}
