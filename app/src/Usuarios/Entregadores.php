<?php

namespace App\src\Usuarios;

use App\Models\UserMeta;
use App\Service\FretesService;
use App\src\Emails\NovoUsuario;

class Entregadores extends Usuarios
{
    public function create($request)
    {
        // Cria Usuario
        $user = $this->cadastraUsuario($request, 'entregador');

        // MataValues do Cliente
        $this->metaValues($request, $user->id);
        $this->precosFretes($request, $user->id);

        $email = new NovoUsuario();
        //$email->enviar($request->nome ?? 'Entregador(a)', $request->email);

        modalSucesso('Entregador ' . $request['nome'] . ' cadastrado com sucesso.');
    }

    private function metaValues($request, $userId)
    {
        $metaValues = new UserMeta();

        $this->precosFretes($request, $userId);

        $metaValues->newQuery()->updateOrInsert(['meta_key' => 'cpf', 'user_id' => $userId], ['value' => $request->cpf]);
        $metaValues->newQuery()->updateOrInsert(['meta_key' => 'cnpj', 'user_id' => $userId], ['value' => $request->cnpj]);
        $metaValues->newQuery()->updateOrInsert(['meta_key' => 'celular', 'user_id' => $userId], ['value' => $request->celular]);
        $metaValues->newQuery()->updateOrInsert(['meta_key' => 'endereco', 'user_id' => $userId], ['value' => $request->endereco]);
        $this->uploadImagens($request, $userId);
    }

    private function setAreaAtendimento($request, $user)
    {
        $user->entregador()->delete();

        foreach ($request->regiao_coleta as $regiao) {
            if (!empty($regiao)) {
                $user->entregador()->create([
                    'meta_key' => 'regiao_coleta',
                    'value' => $regiao
                ]);
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

        session()->flash('sucesso', 'Entregador ' . $request['nome'] . ' editado com sucesso.');
    }

    private function precosFretes($request, $userId)
    {
        $fretesService = new FretesService();

        $fretesService->setPrecosFretes($request, $userId);
    }

    private function uploadImagens($request, $userId): void
    {
        $metaValues = new UserMeta();
        if ($request->hasFile('img_cnh')) {
            if ($request->file('img_cnh')->isValid()) {

                $url = $request->file('img_cnh')->store('/entregadores/documentos');
                $metaValues->newQuery()
                    ->updateOrInsert(
                        ['meta_key' => 'img_cnh', 'user_id' => $userId],
                        ['value' => $url]);
            }
        }
        if ($request->hasFile('img_documento_veiculo')) {
            if ($request->file('img_documento_veiculo')->isValid()) {

                $url = $request->file('img_documento_veiculo')->store('entregadores/documentos');
                $metaValues->newQuery()
                    ->updateOrInsert(
                        ['meta_key' => 'img_documento_veiculo', 'user_id' => $userId],
                        ['value' => $url]);
            }
        }
    }
}
