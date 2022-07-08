<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuario e/ou senha não existem';
        } elseif ($request->get('erro') == 2) {
            $erro = 'Realize o login para acessar a página';
        }
        return view('site.login', ['titulo' => 'Login', $erro]);
    }

    public function autenticar(Request $request)
    {

        //recuperando parametros recebidos do form
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //regras de validacao
        $regras = ['usuario' => 'email', 'senha' => 'required'];

        //retorno das mensagens de validacao
        $feedback = ['usuario.email' => 'O campo de Usuário (e-mail) é obrigatório', 'senha.required' => 'O campo de senha é obrigatório'];
        $request->validate($regras, $feedback);

        //implementando a verificacao no banco de dados
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            //-- INICIANDO SESSAO --//
            session_start();

            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {

            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
