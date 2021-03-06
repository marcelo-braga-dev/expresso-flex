<?php

namespace App\Http\Controllers\Admins\Integracoes\Admins;

use App\src\Integracoes\MercadoLivre\AutenticarAutorizar\DadosIntegracao;
use Illuminate\Http\Request;

class MercadoLivreController
{
    public function index()
    {
        $dadosIntegracao = new DadosIntegracao();

        $appId = $dadosIntegracao->getAppId();
        $clientSecret = $dadosIntegracao->getClientSecret();

        $urlRetorno = $dadosIntegracao->getUrlRetorno();
        $urlNotificacao = $dadosIntegracao->getUrlNotificacao();

        return view('pages.admins.integracoes.mercadolivre.index',
            compact('appId', 'urlRetorno', 'clientSecret', 'urlNotificacao'));
    }

    public function store(Request $request)
    {
        $dadosIntegracao = new DadosIntegracao();

        $dadosIntegracao->setAppId($request->app_id);
        $dadosIntegracao->setClientSecret($request->client_secret);

        session()->flash('sucesso', 'Dados atualizado com sucesso.');

        return redirect()->back();
    }
}
