<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MotivoContato;
use \App\SiteContato;

class PrincipalController extends Controller
{
    public function principal()
    {
        //-- VARIAVEL QUE RECUPERA OS DADOS PREENCHIDOS NO FORM -- //
        $motivo_contatos = MotivoContato::all();

        //-- VIEW QUE EXIBIDA NA TELA -- //
        return view('site.principal', ['motivo_contato' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {

        //-- REQUISICAO QUE FAZ A VERIFICACAO DOS CAMPOS PREENCHIDOS NO FORM -- //
        $request->validate(
            [
                'nome' => 'required | min:3 | max:40',
                'telefone' => 'required | max:12',
                'email' => 'email|required',
                'mensagem' => 'required|max:2000',
                'motivo_contatos_id' => 'required',
            ]
        );

       //-- REFERENCIANDO POR MEIO DE UM METODO ESTATICO OS REGISTROS RECUPERADOS PELO METODO REQUEST, ADICIONANDO OS DADOS PREENCHIDOS NO FORM NO BANCO DE DADOS -- //
        SiteContato::create($request->all());
        //-- CASO A VERIFICACAO TENHA SIDO UM SUCESSO, TODOS OS CAMPOS DO FORM ESTARAO VAZIOS -- //
        redirect()->route('site.index');
        /*-- OBS: CASO AS INFORMACOES NAO TENHAM IDO PRO BANCO DE DADOS, O BLADE DEVOLVERA 
        A PAGINA COM OS DADOS PRE PREENCHIDOS INDICANDO QUE HOUVE UM ERRO NA VERIFICACAO DOS CAMPOS -- */
    }
}
