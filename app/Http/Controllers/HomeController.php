<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /* Renderiza a página home passando:
    * user = Usuário autenticado
    * tasks = Tarefas do usuario autenticado ordenadas pelo columna 'priority' do maior para o menor
    */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->orderByDesc('priority')
            ->get();

        return view('home.index', [
            'user' => Auth::user(),
            'tasks' => $tasks
        ]);
    }
}
