<?php

namespace App\Http\Controllers\Clientes\Integracoes;

use App\Http\Controllers\Controller;
use App\src\Integracoes\MercadoLivre\AutenticarAutorizar\Autenticar;

class MercadoLivreController extends Controller
{
    public function index()
    {
        $autenticacao = new Autenticar();
        $urlIntegracao = $autenticacao->getUrl();

        $contas = [];

        return view('pages.clientes.integracoes.mercadolivre.index', compact('contas', 'urlIntegracao'));
    }
}
