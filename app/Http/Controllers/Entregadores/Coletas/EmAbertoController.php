<?php

namespace App\Http\Controllers\Entregadores\Coletas;

use App\Http\Controllers\Controller;
use App\Models\SolicitacaoRetiradas;
use App\src\Coletas\PesquisarSolicitacoes;
use App\src\Coletas\Status\Aceito;
use Illuminate\Http\Request;

class EmAbertoController extends Controller
{
    public function index()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();
        $status = new Aceito();

        $solicitacoesAceitas = $solicitacaoRetiradas
            ->where('entregador', '=', id_usuario_atual())
            ->where('status', '=', $status->getStatus())
            ->orderBy('id', 'DESC')
            ->get();

        $pesquisarSolicitacoes = new PesquisarSolicitacoes();
        $coletasParaAceitar = $pesquisarSolicitacoes->pesquisar();

        return view(
            'pages.entregadores.coletas.index',
            compact('solicitacoesAceitas', 'coletasParaAceitar')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
