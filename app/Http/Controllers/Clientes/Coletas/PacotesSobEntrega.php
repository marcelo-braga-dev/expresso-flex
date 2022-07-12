<?php

namespace App\Http\Controllers\Clientes\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\EntregaCanceladaCliente;
use App\src\Pacotes\StatusPacotes;
use Illuminate\Http\Request;

class PacotesSobEntrega extends Controller
{
    public function index()
    {
        $statusPacotes = (new StatusPacotes())->statusAtivo();

        $pacotesQuery = (new Pacotes())->newQuery()
            ->where('user_id', '=', id_usuario_atual());

        $pacotes = $pacotesQuery->orderBy('created_at', 'DESC')->get();

        return view('pages.clientes.coletas.pacotes.index', compact('pacotes'));
    }

    public function update($id, Request $request)
    {
        $pacote = (new Pacotes())->newQuery()->findOrFail($id);
        $status = (new EntregaCanceladaCliente())->getStatus();

        $pacote->update([
            'status' => $status
        ]);

        atualizarHistoricoPacote(id_usuario_atual(), $id, $status, $request->motivo_cancelamento);
        modalSucesso('Pacote cancelado com sucesso!');
        return redirect()->back();
    }
}
