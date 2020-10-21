<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogged
{
    /**
     * Caso esteja logado irá redirecionar para rota home
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guest())
        {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
