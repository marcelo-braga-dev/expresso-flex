<?php

namespace App\src\Usuarios;

use App\Mail\NovoUsuarioMail;
use App\Models\PasswordNew;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class Usuarios
{
    public function cadastraUsuario($dados, $tipo, $status = 1)
    {
        try {
            $users = new User();

            return $users->newQuery()
                ->create([
                    'tipo' => $tipo,
                    'name' => $dados['nome'],
                    'email' => strtolower($dados['email']),
                    'status' => $status
                ]);

        } catch (QueryException $e) {
            session()->flash('erro', 'Já existe um usuário com esse email.');
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

            $user->update(
                [
                    'name' => $data['nome'],
                    'email' => strtolower($data['email'])
                ]
            );
            session()->flash('sucesso', 'Dados atualizados com sucesso!');
        } catch (QueryException $e) {
            session()->flash('erro', 'Já existe um usuário com esse email.');
        }

        return $user;
    }
}
