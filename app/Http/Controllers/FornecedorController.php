<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(10);
        //dd($fornecedores);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';
        if ($request->input('_token') != '' && $request->input('id') == '') {
            //-- REGRAS DOS INPUTS - ADICIONAR --//
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' =>  'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            //-- MENSAGEM PERSONALIZADA PARA CADA UM DOS CAMPOS --//
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo Nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo Nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no maximo 2 caracteres',
                'email.email' => 'O campo EMAIL nao foi preenchido corretamente'
            ];
            //-- APLICANDO AS VALIDACOES AO ADICIONAR OS DADOS --//
            $inputs = $request->validate($regras, $feedback);
            Fornecedor::create($inputs);
            //-- CASO FORNECEDOR SEJA ADICIONADO COM SUCESSO, EXIBIRA A MENSAGEM ABAIXO --// 
            $msg = 'Cadastrado com sucesso!!';
        }


        //-- BLOCO DE EDICAO --//
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());


            if ($update) {
                $msg = 'Update feito com sucesso!!';
            } else {
                $msg = 'Update apresentou problemas!';
            }
            //-- EFETUANDO O REDIRECIONAMENTO PARA A PAGINA DE EDICAO PASSANDO UM ARRAY DE PARAMETROS USADOS NA PAGINA --//
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        //echo $id;
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' =>  $msg]);
    }

    public function excluir($id)
    {   
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor.listar');
    }
}
