<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // Renderiza a página com o form para registro
    public function create()
    {
        return view('auth.register');
    }

    // Irá guardar o registro no banco de dados e redirecionar o usuario para tela de login
    public function store(RegisterRequest $request)
    {
        if (!$request->validated())
        {
            return redirect()->route('register');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $request->session()->flash('msg_success', 'Conta criada com sucesso.');

        return redirect()->route('login');
    }

}
