@extends('app.layouts.basico')

@section('titulo','Detalhes do produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Detalhes do Produto</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='#'>Voltar</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection()
