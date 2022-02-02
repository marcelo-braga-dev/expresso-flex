<?php

namespace App\Service;

use App\Models\PrecosFretes;
use App\Models\User;

class FretesService
{
    public function getPrecosFretes($tipo): array
    {
        $fretes = [];
        $precosFretes = PrecosFretes::where('tipo', '=', $tipo)->get();

        foreach ($precosFretes as $dados) {
            if ($dados->meta_key == 'sao_paulo') {
                $fretes[$dados->user_id]['sao_paulo'] = number_format($dados->value, 2, ',', '.');
            }

            if ($dados->meta_key == 'grande_sao_paulo') {
                $fretes[$dados->user_id]['grande_sao_paulo'] = number_format($dados->value, 2, ',', '.');
            }
        }

        return $fretes;
    }

    public function setPrecosFretes($request, $userId)
    {
        $precoFrete = new PrecosFretes();

        $user = User::where('id', '=', $userId)->first('tipo');

        $precoFrete->newQuery()->updateOrInsert(
            ['meta_key' => 'sao_paulo', 'user_id' => $userId],
            [
                'value' =>  converterMoney($request->sao_paulo),
                'title' => 'São Paulo',
                'tipo' => $user->tipo
            ]
        );

        $precoFrete->newQuery()->updateOrInsert(
            ['meta_key' => 'grande_sao_paulo', 'user_id' => $userId],
            [
                'value' => converterMoney($request->grande_sao_paulo),
                'title' => 'Grande São Paulo',
                'tipo' => $user->tipo
            ]
        );

        return $user->tipo;
    }
}
