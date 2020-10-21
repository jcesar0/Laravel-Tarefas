@extends('admin.layout')

@section('title')
    ADMIN
@endsection

@section('content')
    <h1>
        TELA DE ADMIN
        <a href="/logout"> sair </a>
    </h1>

    <hr>

    <div>
        <h2> Este perfil pertence ao usuário: {{ $user->name }} </h2>
        <h5> <b>Nome: </b> {{ $user->name }} </h5>
        <h5> <b>Email: </b> {{ $user->email }} </h5>
        <h5> <b>Tarefas Cadastradas: </b> {{ $user->tasks->count() }} </h5>
        <h5> <b>Criado em: </b> {{ $user->created_at }} </h5>
    </div>


    <div class="mt-4">
        <h2> Tarefas </h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Prioridade</th>
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
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
