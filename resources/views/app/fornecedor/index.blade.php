@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p> Fornecedor
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('app.fornecedor.adicionar') }}'>Novo</a>
                <li><a href='{{ route('app.fornecedor') }}'>Consultar</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                <form method='post' action='{{ route('app.fornecedor.listar') }}'>
                    <!-- GERA UM TOKEN DE UNICIDADE PARA CADA ITEM DO FORM -->
                    @csrf
                    <input type='text' name='nome' placeholder='Nome' class='borda-preta'>
                    <input type='site' name='site' placeholder='Site' class='borda-preta'>
                    <input type='uf' name='uf' placeholder='Unidade Federação' class='borda-preta'>
                    <input type='email' name='email' placeholder='E-mail' class='borda-preta'>
                    <button type='submit' class='borda-preta'>Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection()
