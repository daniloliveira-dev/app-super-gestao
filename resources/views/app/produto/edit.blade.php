@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Alterar Produto</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('produto.index') }}'>Voltar</a>
                <li><a href=''>Consultar Produto</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores])
                @endcomponent
            </div>
        </div>
    </div>
@endsection()
