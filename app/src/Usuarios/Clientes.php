<?php

namespace App\src\Usuarios;

use App\Models\MetaValues;
use App\Models\PrecosFretes;
use App\Models\UserMeta;
use App\Service\FretesService;

class Clientes extends Usuarios
{
    public function create($request, $setFrete = true)
    {        
        // Cria Usuario
        $user = $this->criaUsuario($request, 'cliente');

        if (session('erro')) return;

        // MataValues do Cliente
        $this->metaValues($request, $user->id);

        if ($setFrete) $this->precosFretes($request, $user->id);        

        session()->flash('sucesso', 'Cliente ' . $request['nome'] . ' cadastrado com sucesso. 
        Foi enviado um email ao usuário para criação da senha.');
    }

    public function update($request)
    {
        $user = $this->editaUsuario($request, $request->id);

        $this->metaValues($request, $user->id);

        $this->precosFretes($request, $user->id);

        session()->flash('sucesso', 'Cliente ' . $request['nome'] . ' editado com sucesso.');
    }

    private function metaValues($request, $userId)
    {
        $metaValues = new UserMeta();

        $metaValues->updateOrInsert(['meta_key' => 'celular', 'user_id' => $userId], ['value' => $request->celular]);
        $metaValues->updateOrInsert(['meta_key' => 'cpf', 'user_id' => $userId], ['value' => $request->cpf]);
        $metaValues->updateOrInsert(['meta_key' => 'cnpj', 'user_id' => $userId], ['value' => $request->cnpj]);
        $metaValues->updateOrInsert(['meta_key' => 'nome_fantasia', 'user_id' => $userId], ['value' => $request->nome_fantasia]);
        $metaValues->updateOrInsert(['meta_key' => 'razao_social', 'user_id' => $userId], ['value' => $request->razao_social]);
        $metaValues->updateOrInsert(['meta_key' => 'nome_comercial', 'user_id' => $userId], ['value' => $request->nome_comercial]);
        $metaValues->updateOrInsert(['meta_key' => 'email_comercial', 'user_id' => $userId], ['value' => $request->email_comercial]);
        $metaValues->updateOrInsert(['meta_key' => 'perfil', 'user_id' => $userId], ['value' => $request->perfil]);
    }

    private function precosFretes($request, $userId)
    {
        $fretesService = new FretesService();

        $fretesService->setPrecosFretes($request, $userId);
    }
}