<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Renderiza a página com o form para login
    public function create()
    {
        return view('auth.login');
    }

    /*
     * Procura no banco de dados o primeiro email com a informação passada,
     * faz a verificação das senhas usando a class Hash e caso for verdadeira faz o login com a class Auth
     * e redireciona para rota home caso não seja admin
     * Erro 1 - Email inválido: redireciona para rota login com mensagem de erro "Email não cadastrado"
     * Erro 2 - Senha inválida ou qualquer outro tipo de erro: redireciona para rota login com mensagem de erro "Dados incorretos"
    */
    public function login(Request $request)
    {
        /** @var User $user */
        $user = User::where('email', $request->email)->first();

        if (!$user)
        {
            return redirect()->route('login')->withErrors('Email não cadastrado');
        }

        if (Hash::check($request->password, $user->password))
        {
            Auth::login($user);

            if ($user->role === 6)
            {
                return redirect()->route('admin.home');
            }

            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors('Dados incorretos');
    }
}
