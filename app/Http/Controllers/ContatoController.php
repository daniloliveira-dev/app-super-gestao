<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SiteContato;
use \App\MotivoContato;

class ContatoController extends Controller
{
    //-- COMO SAO 2 ROUTES QUE POSSUEM SUAS FUNCOES, CADA UM DESSES METHODS EXECUTA UMA FUNCAO DIFERENTE NA ROUTE -- //
    //-- CASO QUEIRA VERIFICAR AS ACOES DAS ROUTES, VERIFIQUE NO ROUTES O NOME DA ABA@FUNCAO EXECUTADA -- //

    //-- FUNCAO CONTATO, APENAS EXIBE A VIEW NO NA TELA / USANDO GET -- 
    public function contato(Request $request)
    {
        //-- RECUPERA OS DADOS DO REQUEST QUE ESTAO ARMAZENADOS OS DADOS DO MOTIVO DO CONTATO -- //
        $motivo_contatos = MotivoContato::all();
        //-- CAI NA VIEW QUE EXIBE A PAGINA DE CONTATO -- 
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    //-- FUNCAO SALVAR, COMO O PROPRIO NOME JA DIZ, SALVA OS DADOS DO FORMULARIO QUE O USUARIO PREENCHEU NO BANCO DE DADOS, UTILIZANDO METODO POST -- //
    public function salvar(Request $request)
    {
        // -- FAZENDO A VALIDACAO DOS CAMPOS DO FORMULARIO -- //

        //-- VOCE COLOCA O TIPO DE VALIDACAO DESEJADA E SUAS EXCECOES -- //

        //-- @OBS: CASO CAMPO X TENHA MAIS QUE 12 CARACTERES ELE NAO PASSARA NA VERIFICACAO E CAIRA NA ABA ONDE O METODO OLD() DO BLADE RETORNARA OS DADOS PARA SEREM PREENCHIDOS NOVAMENTE -- //
        
        $regras = 
        [
            'nome' => 'required | min:3 | max:40| unique:site_contatos',
            'telefone' => 'required | max:12',
            'email' => 'email|required',
            'mensagem' => 'required|max:2000',
            'motivo_contatos_id' => 'required',
        ];

        $feedback =
        [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracateres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caractéres',
            'nome.unique' => 'O nome inserido já existe',
            'telefone.max' => 'O campo telefone precisa ser preenchido!!',
            'email.email' => '',
            'required' => 'O campo deve ser preenchido!'
        ];

        $request->validate($regras, $feedback);
        //-- REFERENCIANDO POR MEIO DE UM METODO ESTATICO OS REGISTROS RECUPERADOS PELO METODO REQUEST, ADICIONANDO OS DADOS PREENCHIDOS NO FORM NO BANCO DE DADOS -- //
        SiteContato::create($request->all());
        //-- CASO OS DADOS DO FORM SEJAM PREENCHIDOS DE FORMA CORRETA, AUTOMATICAMENTE CAIRA NO REDIRECIONAMENTO PARA A PAGINA PRINCIPAL DO PROJETO -- //
        return redirect()->route('site.index');
    }
}
