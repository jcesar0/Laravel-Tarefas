@extends('auth.layout')

@section('title')
    Faça Login
@endsection

@section('content')

    <div class="justify-content-center">
        <h1>Entrar</h1>
        <a href="/register">Não possui uma conta? clique aqui</a>

        @include('errors')
        @include('alerts')

        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>

    </div>


@endsection
