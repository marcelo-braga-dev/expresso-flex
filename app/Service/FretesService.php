<?php

namespace App\Service;

use App\Models\PrecosFretes;
use App\Models\User;

class FretesService
{
    public function setPrecosFretes($request, $userId)
    {
        $precoFrete = new PrecosFretes();

        $user = User::where('id', '=', $userId)->first('tipo');

        $precoFrete->updateOrInsert(
            ['meta_key' => 'sao_paulo', 'user_id' => $userId],
            [
                'value' =>  converterMoney($request->sao_paulo),
                'title' => 'São Paulo',
                'tipo' => $user->tipo
            ]
        );

        $precoFrete->updateOrInsert(
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
