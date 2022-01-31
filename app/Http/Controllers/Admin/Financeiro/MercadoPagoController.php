<?php

namespace App\Http\Controllers\Admin\Financeiro;

use App\Http\Controllers\Controller;
use App\src\Integracoes\MercadoPago\DadosIntegracao;
use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function index()
    {
        $dadosIntegracao = new DadosIntegracao();

        $public_key = $dadosIntegracao->getPublicKey();
        $private_key = $dadosIntegracao->getPrivateKey();

        return view('pages.clientes.integracoes.mercadopago.index',
            compact('public_key', 'private_key'));
    }

    public function update(Request $request)
    {
        $dadosIntegracao = new DadosIntegracao();

        $dadosIntegracao->setPublicKey($request->public_key);
        $dadosIntegracao->setPrivateKey($request->private_key);

        session()->flash('sucesso', 'Dados atualizado com sucesso!');

        return redirect()->back();
    }
}
