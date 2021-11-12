<?php

namespace App\Http\Controllers\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\RegioesEntregadores;
use App\Service\Entregadores\EntregadoresService;
use App\Service\Pacotes\PacotesService;
use App\src\Pacotes\StatusPacote;
use Illuminate\Http\Request;

class ConferenteController extends Controller
{
    // Pagina de checkin
    public function checkinColetas()
    {
        $pacotes = [];
        // $pacotes = $this->getPacotesBase();
        
        return view('pages.conferente.checkin.index', compact('pacotes'));
    }

    public function pacotesBase()
    {
        $pacotes = [];

        $pacotes = $this->getPacotesBase();

        return view('pages.conferente.checkin.pacotes-base', compact('pacotes'));
    }

    // Mostra informacoes para confirmar o checkin
    public function infoCheckin(Request $request)
    {
        $pacotes = new Pacotes();
        $entregadores = new RegioesEntregadores();
        $entregadoresService = new EntregadoresService();

        $entregadorRecomendado = '';

        if ($request->origem == 'mercado_livre') {
            $codigo = $request->id ?: $request->codigo;

            $pacote = $pacotes->query()
                ->where('codigo', '=', $codigo)
                ->where('origem', '=', $request->origem)
                ->first();
        }

        if ($request->origem == 'expresso_flex') {
            $pacote = $pacotes->query()
                ->where('id', '=', $request->id)
                ->where('user_id', '=', $request->sender_id)
                ->where('origem', '=', $request->origem)
                ->first();
        }

        if (empty($pacote->id) || $pacote->status == 'pacote_nova_etiqueta') {
            session()->flash('erro', 'Registro não encontrado.');
            return redirect()->route('conferente.checkin.pacotes');
        }

        if ($pacote->status != 'pacote_coletado') {
            session()->flash('erro', 'Já foi realizado o check-in desse pacote.');
            return redirect()->route('conferente.checkin.pacotes');
        }

        $todosEntregadores = $entregadoresService->getEntregadores();

        $regioesEntregadores = $entregadores
            ->query()
            ->where('meta_key', '=', 'regiao_entrega')
            ->orderBy('value', 'ASC')->get();

        $cepPacote = preg_replace('/\D/', '', $pacote->regiao);

        foreach ($regioesEntregadores as $regiao) {

            $cepMin = str_pad($regiao->value, 8, '0');
            $cepMax = str_pad($regiao->value, 8, '9');
            $x[] = $cepMin;

            if ($cepPacote > $cepMin && $cepPacote < $cepMax) {
                $entregadorRecomendado = $regiao->user_id;
            }
        }

        return view(
            'pages.conferente.checkin.info-checkin',
            compact('pacote', 'todosEntregadores', 'entregadorRecomendado')
        );
    }

    // Rota para confirmar checkin
    public function confimarCheckin(Request $request, PacotesService $pacotesService)
    {
        $pacote = Pacotes::find($request->id);

        $pacote->update(['entregador' => $request->id_entregador]);

        $pacotesService->alteraStatusPacote($request->id, 'pacote_base');

        session()->flash('sucesso', 'Check-in do pacote realizado com sucesso.');

        return redirect()->route('conferente.checkin.pacotes');
    }

    public function getPacotesBase()
    {
        $pacotes = new Pacotes();

        $pacotes = $pacotes->query()
            ->where('status', '=', 'pacote_base')
            ->orderBy('updated_at', 'DESC')
            ->get();
        return $pacotes;
    }
}
