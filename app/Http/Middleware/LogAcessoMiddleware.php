<?php

namespace App\Http\Middleware;

use Closure;
use \App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //$request -> manipular
        //return $next($request);
        //$response -> manupular

        //verifica se o user possui acesso a rota

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP: $ip requisitou $rota"]);
        //return Response('Chegamos ao middleware e finalizamos aqui!');
        $resposta = $next($request);

        return $resposta;
    }
}
