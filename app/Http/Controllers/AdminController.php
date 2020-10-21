<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /* Renderiza a página admin.home passando
    * users = pega todos usuarios do banco de dados e retorna uma paginção simples
    */
    public function index(): View
    {
        $users = User::simplePaginate(10);

        return view('admin.index', [
            'users' => $users
        ]);
    }

    /* Renderiza a página admin.user_show passando
     * user: usuário adquidiro apartir do id
     * tasks: tarefas do usuario
     */
    public function show(int $id): View
    {
        $user = User::find($id);
        return view('admin.user_show', [
            'user' => $user,
            'tasks' => $user->tasks,
        ]);
    }

}
