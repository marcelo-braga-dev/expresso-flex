<?php

namespace App\src\Usuarios;

use App\Models\UserMeta;
use App\Service\FretesService;

class Entregadores extends Usuarios
{
    public function create($request)
    {
        // Cria Usuario
        $user = $this->cadastraUsuario($request, 'entregador');

        if (session('erro')) return;

        // MataValues do Cliente
        $this->metaValues($request, $user->id);

        $this->precosFretes($request, $user->id);

        $this->setAreaAtendimento($request, $user);

        session()->flash('sucesso', 'Entregador ' . $request['nome'] . ' cadastrado com sucesso.');
    }

    private function metaValues($request, $userId)
    {
        $metaValues = new UserMeta();

        $this->precosFretes($request, $userId);

        $metaValues->updateOrInsert(['meta_key' => 'cpf', 'user_id' => $userId], ['value' => $request->cpf]);
        $metaValues->updateOrInsert(['meta_key' => 'celular', 'user_id' => $userId], ['value' => $request->celular]);
        $metaValues->updateOrInsert(['meta_key' => 'perfil', 'user_id' => $userId], ['value' => $request->perfil]);
    }

    private function setAreaAtendimento($request, $user)
    {
        $user->entregador()->delete();

        foreach ($request->regiao_coleta as $regiao) {
            if (!empty($regiao)) {
                $user->entregador()->create(
                    [
                        'meta_key' => 'regiao_coleta',
                        'value' => $regiao
                    ]
                );
            }
        }

        foreach ($request->regiao_entrega as $regiao) {
            if (!empty($regiao)) {
                $user->entregador()->create(
                    [
                        'meta_key' => 'regiao_entrega',
                        'value' => $regiao
                    ]
                );
            }
        }
    }

    public function update($request)
    {
        $user = $this->editaUsuario($request, $request->id);

        $this->metaValues($request, $user->id);

        $this->setAreaAtendimento($request, $user);

        session()->flash('sucesso', 'Entregador ' . $request['nome'] . ' editado com sucesso.');
    }

    private function precosFretes($request, $userId)
    {
        $fretesService = new FretesService();

        $fretesService->setPrecosFretes($request, $userId);
    }
}
