<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\isLogged;
use App\Http\Middleware\RoleAuthenticator;
use App\Http\Middleware\UserAuthenticator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Rotas que PRECISAM da autenticação do usuario.
Route::group([
    'middleware' => UserAuthenticator::class
], function ()
{
    //exemplo: meusite.com/tasks
    Route::group([
        'prefix' => 'tasks'
    ], function ()
    {
        Route::get('/', [HomeController::class, 'index'])
            ->name('home');
        Route::post('/', [TaskController::class, 'store']);
        Route::delete('/{id}', [TaskController::class, 'destroy']);

    });

    /*
    * exemplo meusite.com/admin
    *  Essa rota utiliza o middleware RoleAuthenticator que verifica qual a role do usuario e retorna para devida pagina
    */
    Route::group([
        'prefix' => 'admin',
        'middleware' => RoleAuthenticator::class
    ], function ()
    {
        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.home');

        Route::get('/user/{id}', [AdminController::class, 'show'])
            ->name('admin.user_show');
    });

    // Rota de logout
    Route::get('/logout', function ()
    {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

});

/*
 * Rotas para Login e Cadastro possuem o middleware isLogged que verifica se já está logaco
 * caso verdadeiro retorna para a página de tarefas
 */
Route::group([
    'middleware' => isLogged::class
], function ()
{
    Route::get('/register', [RegisterController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});



