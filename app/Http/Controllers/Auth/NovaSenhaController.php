<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordNew;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NovaSenhaController extends Controller
{
    public function index(string $email, string $hash)
    {
        return view('auth.nova-senha', compact('email', 'hash'));
    }

    public function update(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            session()->flash('password', 'Senhas não coincidem.');
            return redirect()->back();
        }

        $PasswordNew = new PasswordNew();

        $info = $PasswordNew
            ->where('email', '=', $request->email)
            ->where('token', '=', $request->hash)
            ->first();

        if (empty($info->email)) {
            session()->flash('invalido', 'Dados inválidos, requisite uma nova recuperação de senha.');
            return redirect()->back();
        }

        $senha = Hash::make($request->password);

        User::where('email', '=', $request->email)->update(['password' => $senha]);

        $PasswordNew->where('email', '=', $request->email)->delete();

        return redirect()->route('home');
    }
}
