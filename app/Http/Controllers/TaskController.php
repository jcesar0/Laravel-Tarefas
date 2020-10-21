<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /*
     * Irá pegar o usuário apartir da class Auth e criar uma tarefa usando o proprio
     * após isso vai redireciona-lo para rota home com a mensagem "Tarefa criada com sucesso"
     * */
    public function store(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $user->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'color' => $request->color
        ]);

        $request->session()->flash('msg_success', 'Tarefa criada com sucesso');
        return redirect()->route('home');
    }

    /*
     * Irá buscar a tarefa passada pelo id, excluir ela e redirecionar o usuario para pagina home
     * Erro 1 - Informar tarefa que não pertence: será enviado de volta para rota home e exibida mensagem de erro "Erro ao executar ação"
     * Erro 2 - Informar tarefa com id inválido: mesma condição da opção de erro 1
     * Erro 3 - Qualquer outro tipo de erro: mesma condição da opção de erro 1
     * */
    public function destroy(Request $request, int $id): RedirectResponse
    {
        $task = Task::find($id);

        if (!$task OR $task->user_id !== Auth::id())
        {
            return  redirect()->route('home')->withErrors('Erro ao executar ação');
        }

        if (Task::destroy($id))
        {
            $request->session()->flash('msg_success', 'Tarefa excluida com sucesso');
            return redirect()->route('home');
        }

        return  redirect()->route('home')->withErrors('Erro ao executar ação');
    }
}
