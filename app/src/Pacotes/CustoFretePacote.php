<?php

namespace App\src\Pacotes;

use App\Models\ComissoesEntregadores;
use App\Models\Enderecos;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PrecosFretes;
use App\Service\EnderecosService;

class CustoFretePacote
{
    public function setPrecoFretePacote(int $idPacote)
    {
        $fretesRealizados = new FretesRealizados();
        $comissoesEntregadores = new ComissoesEntregadores();

        $pacote = Pacotes::find($idPacote);

        $valor = $this->getValorFreteCliente($pacote->id);

        $fretesRealizados->create([
            'user_id' => $pacote->user_id,
            'pacotes_id' => $idPacote,
            'entregador' => id_usuario_atual(),
            'status' => 'aberto',
            'regiao' => $valor['regiao'],
            'value' => $valor['preco']
        ]);

        $comissao = $this->getComissaoEntregador($valor['regiao']);

        $comissoesEntregadores->create([
            'user_id' => id_usuario_atual(),
            'pacotes_id' => $idPacote,
            'status' => 'aberto',
            'value' => $comissao,
            'regiao' => $valor['regiao']
        ]);
    }

    private function getValorFreteCliente(int $idPacote)
    {
        $precosFretes = new PrecosFretes();


        $pacote = Pacotes::find($idPacote);

        $regiao = $this->getRegiao($pacote->regiao);

        $preco = $precosFretes->query()
            ->where('user_id', '=', $pacote->user_id)
            ->where('meta_key', '=', $regiao)
            ->first();

        if (empty($preco->value)) return 0;

        return ['preco' => $preco->value, 'regiao' => $regiao];
    }

    private function getComissaoEntregador(string $regiao)
    {
        $precosFretes = new PrecosFretes();

        $comissao = $precosFretes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('meta_key', '=', $regiao)
            ->first();

        if (empty($comissao->value)) return 0;

        return $comissao->value;
    }

    private function getRegiao(string $regiao)
    {
        $enderecosService = new EnderecosService();
        return $enderecosService->getRegiaoCep($regiao);
    }
}
