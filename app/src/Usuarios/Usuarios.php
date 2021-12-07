<?php

namespace App\src\Usuarios;

use App\Models\PasswordNew;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class Usuarios
{
    public function criaUsuario($dados, $tipo, $status)
    {
        try {
            $user = User::create(
                [
                    'tipo' => $tipo,
                    'nome' => $dados['nome'],
                    'email' => strtolower($dados['email']),
                    'status' => $status
                ]
            );
        } catch (QueryException $e) {
            return session()->flash('erro', 'Já existe um usuário com esse email.');
        }

        $this->enviarEmailNovoUsuario($dados);

        return $user;
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
                    'nome' => $data['nome'],
                    'email' => strtolower($data['email'])
                ]
            );
        } catch (QueryException $e) {            
            session()->flash('erro', 'Já existe um usuário com esse email.');
        }

        return $user;
    }

    private function enviarEmailNovoUsuario($dados)
    {
        $nome = $dados['nome'];
        $email = strtolower($dados['email']);

        $hash = hash('md5', bin2hex(random_bytes(256)));

        $link = route('mail.usuario.retorno.novo-senha', [$email, $hash]);

        PasswordNew::create(['email' => $email, 'token' => $hash]);

        $conteudoEmail = new \App\Mail\NovoUsuarioMail($nome, $link);

        $user = (object) [
            'email' => $email,
            'name' => $nome
        ];

        Mail::to($user)->send($conteudoEmail);
    }
}
