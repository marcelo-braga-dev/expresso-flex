<?php

use App\Models\Destinatarios;
use App\Models\Enderecos;
use App\Models\Entregadores;
use App\Models\LojasClientes;
use App\Models\Meta;
use App\Models\MetaValues;
use App\Models\User;
use App\Service\EnderecosService;

function id_usuario_atual()
{
    return auth()->user()->id;
}

function get_loja($id)
{
    $loja = new LojasClientes();

    $lojas = $loja::query()
        ->where('id', '=', $id)
        ->first();

    return $lojas;
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
    /**
     * 'coleta_cancelada_cliente'
     * 'coleta_cancelada_entregador'
     * 'coleta_solicitada'
     * 'coleta_aceita'
     * 'coleta_realizada'
     * 'coleta_finalizada'
     **/

    $meta = Meta::find(3);

    $resposta = $meta->values()->where('meta_key', '=', $key)->first();

    return $resposta->value;
}

function get_status_pacote(string $key)
{
    /**
     * pacote_coletado
     * pacote_base
     * pacote_entrega_iniciado
     * pacote_entrega_destinatario
     * pacote_entrega_finalizado
     * 
     * pacote_destinatario_ausente
     * pacote_cancelado_entregador
     * pacote_nova_etiqueta
     **/

    $meta = Meta::find(5);

    $resposta = $meta->values()->where('meta_key', '=', $key)->first();

    return $resposta->value;
}

// function get_endereco_por_cep(string $cep, string $numero = '')
// {
//     $endereco = new EnderecosService();

//     $resposta = $endereco->getEnderecoCompleto($cep, $numero);

//     return $resposta;
// }

// function get_cidade_por_id(string $idCidade)
// {
//     $endereco = new EnderecosService();

//     $cidade = $endereco->getCidade($idCidade);

//     return $cidade;
// }

function get_origem_pacote(string $origem)
{
    $meta = Meta::all();

    $res = $meta->find(6);

    $res = $res->values()->where('meta_key', '=', $origem)->first('value');

    return $res->value;
}

// function get_cep_ponto_coleta(int $idLoja, int $idUsuario = null)
// {
//     $loja = new LojasClientes();

//     $loja = $loja::query()
//         ->where('id', '=', $idLoja)
//         ->where('user_id', '=', $idUsuario)
//         ->first();

//     return $loja->cep;
// }

function get_info_ponto_coleta(int $id)
{
    $loja = new LojasClientes();

    $loja = $loja::query()
        ->where('id', '=', $id)
        ->first();

    return $loja;
}

function get_dados_usuario(int $id)
{
    return User::find($id);
}

function get_nome_usuario(int $id)
{
    return User::find($id)->nome;
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

function get_endereco_destinatario(int $id, $separado = false)
{
    $destinatario = Destinatarios::find($id);

    if ($separado) return get_endereco_separado($destinatario->endereco);

    return get_endereco($destinatario->endereco);
}

function get_endereco(int $id)
{
    $dados = Enderecos::find($id);

    $cep = formatar_cep($dados->cep);

    $complemento = '';

    if (!empty($dados->complemento)) $complemento = ', Complemento: ' . $dados->complemento;

    $endereco = $dados->rua . ', n. ' . $dados->numero . $complemento . ', ' .
        $dados->bairro . ', ' . $dados->cidade;
    // . ', Cep: ' . $cep . ', Cidade: ' . $dados->cidade . ' - SP';

    return $endereco;
}

function formatar_cep(string $cep)
{
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

function converterMoney(string $valor)
{
    if (!is_numeric($valor)) {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
    }

    return $valor;
}
