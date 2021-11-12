<?php

namespace App\Http\Controllers\Entregadores;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Entregadores\Coleta\ColetasController;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class HomeEntregadoresController extends Controller
{
    public function index()
    {        
        $coletasEmAberto =  $this->emAberto();
        
        $solicitacoesAceitas = $this->emAndamento();
        
        return view('pages.entregadores.home', compact('coletasEmAberto', 'solicitacoesAceitas'));
    }
    
    public function emAberto()
    {
        $coletasAberto = new ColetasController();

        return $coletasAberto->getTodasSolicitacoes();
    }

    public function emAndamento()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $idUsuario = id_usuario_atual();

        $solicitacoesAceitas =
            $solicitacaoRetiradas
                ->where('entregador', '=', $idUsuario)
                ->where('status', '=', 'coleta_aceita')
                ->orderBy('cep', 'ASC')
                ->get()
                ->toArray();

        return $solicitacoesAceitas;
    }

    public function pesquisarPacote(Request $request)
    {
        $pacote = new Pacotes();

        $pacote->query()
            ->where('entregador', '=', id_usuario_atual())
            ->where('rastreio')
            ->first();

        if ($pacote->isEmpty()) {

            session()->flush('erro', 'Não foi encontrado pacote com esse código.');

            return redirect()->back();
        }
        print_pre($pacote);
    }
}
