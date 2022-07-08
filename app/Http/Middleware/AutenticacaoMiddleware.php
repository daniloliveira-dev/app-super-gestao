<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao)
    {
        session_start();

        if (isset($_SESSION['email']) and $_SESSION['email'] != '') {
            //-- EMPURRA A APLICACAO PARA O PASSO SEGUINTE --//
            return $next($request);
        } else {
            //-- RETORNA A APLICACAO PARA A PAGINA DE LOGIN PARA EFETUAR VALIDACAO DE USUARIO --//
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
