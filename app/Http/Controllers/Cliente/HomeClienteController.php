<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use App\Service\PesquisarPacoteService;
use Illuminate\Http\Request;

class HomeClienteController extends Controller
{
    public function index(Request $request)
    {                
        if (!empty($request->codigo_pacote_pesquisar)) {
            $pesquisar = new PesquisarPacoteService();

            $infoPesquisa = $pesquisar->getInfoPacotePesquisa($request->codigo_pacote_pesquisar);

            if ($infoPesquisa) return $infoPesquisa;

            return redirect()->back();
        }

        return view('pages.cliente.home');
    }    
}
