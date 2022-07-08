@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Cliente</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('cliente.index') }}'>Voltar</a>
                <li><a href=''>Consultar Cliente</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                @component('app.cliente._components.form_create_edit')
                @endcomponent
            </div>
        </div>
    </div>
@endsection()
