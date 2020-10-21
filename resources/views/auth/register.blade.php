@extends('auth.layout')

@section('title')
Crie uma conta
@endsection

@section('content')

    <div class="justify-content-center">
        <h1>Crie sua conta</h1>
        <a href="/login">Já possui uma conta? clique aqui</a>

        @include('errors')
        @include('alerts')

        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>


@endsection
