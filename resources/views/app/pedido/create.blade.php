@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Pedido</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('pedido.index') }}'>Voltar</a>
                <li><a href=''>Consultar Pedido</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                @component('app.pedido._components.form_create_edit', ['clientes'=> $clientes])
                @endcomponent
            </div>
        </div>
    </div>
@endsection()
