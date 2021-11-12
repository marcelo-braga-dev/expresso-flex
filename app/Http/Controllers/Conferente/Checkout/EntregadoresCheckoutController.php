<?php

namespace App\Http\Controllers\Conferente\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\User;
use App\Service\Entregadores\EntregadoresService;
use Illuminate\Http\Request;

class EntregadoresCheckoutController extends Controller
{
    // public function index()
    // {
    //     $Pacotes = new Pacotes();
    //     $entregadores = [];

    //     $pacotes = $Pacotes->query()
    //         ->where('status', '=', 'pacote_base')
    //         ->orderBy('updated_at', 'DESC')
    //         ->get();

    //         foreach ($pacotes as $pacote)
    //         {
    //             $entregadores[$pacote->entregador]['id_entregador'] = $pacote->entregador;
    //             $entregadores[$pacote->entregador]['pacotes'][] = $pacote;
    //         }

    //     return view('pages.conferente.checkout.entregadores', compact('entregadores'));
    // }

    public function info(Request $request)
    {
        $Pacotes = new Pacotes();
        
        $entregadoresService = new EntregadoresService();
        $entregadores = $entregadoresService->getEntregadores();

        $pacotes = $Pacotes->query()
            ->where('entregador', '=', $request->id)
            ->where('status', '=', 'pacote_base')
            ->get();

            return view('pages.conferente.checkout.info-entregador-pacotes', 
                compact('pacotes', 'entregadores'));
    }

    public function alterarEntregadorPacote(Request $request)
    {
        Pacotes::find($request->id_pacote)
            ->update(['entregador' => $request->id_novo_entregador]);

        return redirect()->back();
    }
}
