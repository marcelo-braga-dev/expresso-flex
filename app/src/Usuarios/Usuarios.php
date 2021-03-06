<?php

namespace App\src\Usuarios;

use App\Models\PasswordNew;
use App\Models\User;
use Illuminate\Database\QueryException;

class Usuarios
{
    public function cadastraUsuario($dados, $tipo, $status = 1)
    {
        try {
            return (new User())->newQuery()
                ->create([
                    'tipo' => $tipo,
                    'name' => $dados['nome'],
                    'email' => strtolower($dados['email']),
                    'status' => $status
                ]);

        } catch (QueryException $e) {
            throw new \DomainException('Já existe um usuário com esse email.');
        }
    }

    public function editaUsuario($data, $idUsuario)
    {
        $clsPasswordNew = new PasswordNew();

        $user = User::find($idUsuario);

        try {
            $clsPasswordNew->query()
                ->where('email', '=', $user->email)
                ->update(['email' => $data['email']]);

            $user->update([
                'name' => $data['nome'],
                'email' => strtolower($data['email'])
            ]);
            modalSucesso('Dados atualizados com sucesso!');
        } catch (QueryException $e) {
            modalErro('Já existe um usuário com esse email.');
        }

        return $user;
    }
}
