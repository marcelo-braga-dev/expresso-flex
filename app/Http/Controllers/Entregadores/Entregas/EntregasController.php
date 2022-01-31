<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\EntregaFinalizado;
use App\src\Pacotes\Status\EntregaIniciado;
use Illuminate\Http\Request;

class EntregasController extends Controller
{
    public function index()
    {
        $status = new EntregaIniciado();

        $pacotesService = new PacotesService();

        $pacotes = $pacotesService->getPacotesEntrega($status->getStatus());

        return view('pages.entregadores.entregas.index', compact('pacotes'));
    }

    public function show($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        return view('pages.entregadores.entregas.show', compact('pacote'));
    }

    public function edit($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        return view('pages.entregadores.entregas.edit', compact('pacote'));
    }

    public function update(Request $request, $id)
    {
        $recebedor = new DestinatarioRecebedor();
        $recebedor->newQuery()
            ->create([
                'pacotes_id' => $id,
                'recebedor' => $request->recebedor,
                'nome' => $request->nome_recebedor,
                'documento' => $request->documento_recebedor,
                'obsevacoes' => $request->observacoes,
            ]);

        $pacote = new Pacote(new EntregaFinalizado());
        $pacote->finalizar($id);

        return redirect()->route('entregadores.entregas.index');
    }

}
