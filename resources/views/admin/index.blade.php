@extends('admin.layout')

@section('title')
    ADMIN
@endsection

@section('content')
    <H1>
        TELA DE ADMIN
        <a href="/logout"> sair </a>
    </H1>

    <hr>
    <h4> Lista de usuários </h4>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Qtd. Tarefas</th>
                <th scope="col">Criado em</th>
                <th scope="col">Ultima Atualização</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td> <a href="{{ route('admin.user_show', $user->id) }}"> {{ $user->name }} </a>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->tasks->count() }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-md-center">
        {{ $users->links() }}
    </div>

@endsection
