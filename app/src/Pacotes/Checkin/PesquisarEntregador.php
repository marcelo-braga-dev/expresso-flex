<?php

namespace App\src\Pacotes\Checkin;

use App\Models\Pacotes;
use App\Models\RegioesEntregadores;
use App\Service\Entregadores\EntregadoresService;

class PesquisarEntregador
{
    public function pesquisar()
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
            return redirect()->route('conferentes.checkin.index');
        }

        if ($pacote->status != 'pacote_coletado') {
            session()->flash('erro', 'Já foi realizado o check-in desse pacote.');
            return redirect()->route('conferentes.checkin.index');
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
    }
}
