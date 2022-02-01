<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbrirSolicitacaoColetaController extends Controller
{
    public function index()
    {
        $resposta = json_decode($_GET['json'], true);

        if (empty($resposta['id']) || empty($resposta['origem'] || empty($resposta['id_loja']))) {
            session()->flash('erro', 'Ocorreu um erro na leitura do QrCode.');

            return redirect()->route('entregadores.coletas.create');
        }

        if ($resposta['origem'] != 'identifica_usuario') {
            session()->flash('erro', 'Esse QrCode não é de identificação de pontos de coleta.');

            return redirect()->route('entregadores.coletas.criar-coleta');
        }

        return redirect()->route('entregadores.coletas.store', $resposta)->withInput(['id'=>'vd']);
    }
}
