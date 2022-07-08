@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Editar Detalhes do Produto</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='#'>Voltar</a>
            </ul>
        </div>
        <div class='informacao-pagina'>

        <h4>Produto<h4>
        <div> Nome: {{ $produto_detalhe->produto->nome }}
        <br>
        <div> Descrição: {{ $produto_detalhe->produto->descricao }}
            <div class="informacao-form">
                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe ,'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection()
