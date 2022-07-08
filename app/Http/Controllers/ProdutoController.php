<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Unidade;
use App\Produto;
use App\ProdutoDetalhe;
use App\Item;
use App\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //-- METODO DE CARREGAMENTO PRECOCE - CARREGA OS DADOS DO BANCO NO MOMENTO DA CONSULTA --//
        //-- CONCEITO DE EAGER LOADING E LAZY LOADING --//
        $produtos = Item::with(['produtoDetalhe', 'fornecedor'])->paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * PERSISTENCIA DOS DADOS PREENCHIDOS NOS INPUTS NO BANCO DE DADOS APOS SEREM VALIDADOS, CASO PASSEM NA VALIDACAO OS DADOS SERAO PERSISTIDOS NO BANCO.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required| min:3|max:40',
            'descricao' => 'required|min:3|max:40',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'nome.min' => 'O campo deve ter no mínimo 3 caractéres',
            'nome.max' => 'O campo Nome deve ter no máximo 40 caractéres',
            'descricao.min' => 'O campo Descrição deve ter no mínimo 3 caractéres',
            'descricao.max' => 'O campo Descrição deve ter no máximo 40 caractéres',
            'peso.integer' => 'O valor do peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida não foi informada ou não existe',
            'fornecedor_id.exists' => 'O fornecedor não foi informada ou não existe'
        ];
        
        //-- apos efetuar as tratativas, o laravel insere os dados preenchidos no banco de dados, caso todos os dados passe na validação --// 
        $validateSuccess = $request->validate($regras, $feedback);
        Item::create($validateSuccess);
        return redirect()->route('produto.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //-- EXIBIÇÃO DOS DADOS APOS RODAR O METODO --//
        //print_r($request->all());
        //echo '<br><br><br><br>';
        //-- VALORES DO INPUT ANTES DE RODAR O METODO UPDATE, QUE SAO OS VALORES ANTES DE SEREM ALTERADOS. --//
        //print_r($produto->getAttributes());

        //-- PERSISTENCIA DOS DADOS ALTERADOS NO BANCO DE DADOS, QUE SAO OS DADOS ALTERADOS QUE FORAM ALTERADOS NO INPUT --//
        $regras = [
            'nome' => 'required| min:3|max:40',
            'descricao' => 'required|min:3|max:40',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'nome.min' => 'O campo deve ter no mínimo 3 caractéres',
            'nome.max' => 'O campo Nome deve ter no máximo 40 caractéres',
            'descricao.min' => 'O campo Descrição deve ter no mínimo 3 caractéres',
            'descricao.max' => 'O campo Descrição deve ter no máximo 40 caractéres',
            'peso.integer' => 'O valor do peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida não foi informada ou não existe',
            'fornecedor_id.exists' => 'O fornecedor não foi informada ou não existe'
        ];
        
        //-- apos efetuar as tratativas, o laravel insere os dados preenchidos no banco de dados, caso todos os dados passe na validação --// 
        $validateSuccess = $request->validate($regras, $feedback);
        $produto->update($validateSuccess);
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {   
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
