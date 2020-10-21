@extends('home.layout')

@section('title')
    Tarefas
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1>
            Painel de tarefas de {{ $user->name }} |
            <a href="/logout">Sair</a>
        </h1>
    </div>

    <div class="d-flex justify-content-center">
        @include('alerts')
        @include('errors')
    </div>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTask">
            + Nova Tarefa
        </button>
    </div>

    <div class="mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <th bgcolor="{{ $task->color }}"></th>
                    <th> {{ $task->name }} </th>
                    <td> {{ $task->description }} </td>
                    <td>
                        @switch($task->priority)
                            @case(1)
                                Baixa
                                @break
                            @case(2)
                                Média
                                @break
                            @case(3)
                                Alta
                                @break
                            @default
                                @break
                        @endswitch
                    </td>
                    <td>
                        @include('task.delete')
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <div class="modal fade" id="newTask" data-backdrop="static" tabindex="-1" aria-labelledby="newTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTaskLabel">Cadastrar Nova Tarefa</h5>
                </div>
                <div class="modal-body">
                    @include('task.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" form="form-task" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
